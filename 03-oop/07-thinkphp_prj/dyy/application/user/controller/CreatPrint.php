<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/16
 * Time: 17:19
 */

namespace app\user\controller;
use app\user\controller\UserBase;
use app\user\model\User;
use app\user\model\Files;
use think\Request;
use think\File;

class CreatPrint extends UserBase {

    protected $contentTypes = [
        'jpg' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'doc' => 'application/msword',
        'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        'pdf' => 'application/pdf'
    ];

    public function index(){

        $User = new User;
        $userInfo = $User->getAuthInfo();
        $where = [
            'f_uid' => $userInfo['id'],
        ];
        $list = Files::where($where)->order("f_id DESC")->paginate(5);
        $this->view->list = $list;
        return $this->fetch();
    }

    public function upload(){
        return $this->fetch();
    }

    public function webuploader() {
//        sleep(5);

        $uploadPath = ROOT_PATH . 'public/uploads';

        //根据mime类型判断
        //还可以根据后缀名判断
//        $mimes = ['image/jpeg', 'image/png', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/pdf'];
        $extensions = ['jpg', 'png', 'doc', 'docx', 'pdf'];
        $request = Request::instance();

        if (!$request->has('file', 'file')) {
            die('no file');
        }

        //获取文件
        $file = $request->file('file');
        //dump($file);

        //后缀
        $extension = strtolower(pathinfo($file->getInfo('name'), PATHINFO_EXTENSION));



        //检测格式
        if (in_array($extension, $extensions) === false) {
            die('{"jsonrpc" : "2.0", "error" : {"code": 1001, "message": "上传格式不允许."}, "id" : "id"}');
        }


        /*
          if (!$file->checkMime($mimes)) {
          die('{"jsonrpc" : "2.0", "error" : {"code": 1002, "message": "上传格式不允许."}, "id" : "id"}');
          }
         *
         */

        $file->move($uploadPath, time() . ".". $extension);

//        $file->rule(function() {
//            return date("m-d") . "/" . md5(microtime(true));
//        })->move($uploadPath);

//        $file->rule(function() use ($file) {
//            return date("m-d") . "/" . strtolower(pathinfo($file->getInfo('name'), PATHINFO_BASENAME));
//        })->move($uploadPath);

        //生成地址
        $rule = $this->generateFilepath();
        //移动
        $file->move($uploadPath, $rule);
        //保持数据库
        $this->record($file, $rule);

        die('{"jsonrpc" : "2.0", "result" : null, "id" : "id"}');
    }

    protected function generateFilepath() {
        $User = new User;
        $userInfo = $User->getAuthInfo();
        return $userInfo['username'] . "/" . date("m-d") . "/" . md5(microtime(true));
    }

    /**
     * 记录信息到数据表
     */
    protected function record(File $file, $filepath) {
        $User = new User;
        $userInfo = $User->getAuthInfo();
        $data = [
            'f_uid' => $userInfo['id'],
            'f_filename' => $file->getInfo('name'),
            'f_filesize' => $file->getSize(),
            'f_upload_time' => date("Y-m-d H:i:s"),
            'f_filepath' => $filepath,
            'f_ext' => strtolower(pathinfo($file->getInfo('name'), PATHINFO_EXTENSION))
        ];
        $row = Files::create($data);
    }

    /**
     * 删除
     */
    public function trash() {
        //获取ID
        $request = Request::instance();
        $id = $request->param("id");
        //判断ID
        if (!$id) {
            echo "invalid id";
            return false;
        }

        //获取信息
        $row = Files::get([
            'f_id' => $id
        ]);
        //判断信息
        if (!$row) {
            echo "指定ID的文件不存在";
            return false;
        }

        //删除文件
        $this->trashFileRecord($row);
        //删除信息
        $this->trashFile($row);
        $back = !empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "/user/preprint/";
        $this->redirect($back);
    }

    /**
     * 删除文件记录
     *
     * @param type $frow
     */
    protected function trashFileRecord(Files $frow) {
        return $frow->delete();
    }

    /**
     * 删除文件
     * @param Files $frow
     */
    protected function trashFile(Files $frow) {
        $absoluteFilepath = ROOT_PATH . '/public/uploads/' . $frow['f_filepath'] . "." . $frow['f_ext'];
        if (file_exists($absoluteFilepath)) {
            return unlink($absoluteFilepath);
        }
    }

    /**
     * 下载
     */
    public function download() {
        $request = Request::instance();
        $id = $request->param("id");
        if (!$id) {
            echo "invalid id";
            die();
        }

        $frow = Files::get([
            'f_id' => $id
        ]);
        if (!$frow) {
            echo "指定id的文件不存在";
            return false;
        }
        $this->downloadFile($frow);
    }

    protected function downloadFile(Files $frow) {
        $absoluteFilepath = ROOT_PATH . '/public/uploads/' . $frow['f_filepath'] . "." . $frow['f_ext'];
        header("Content-Disposition: attachment; filename=\"{$frow['f_filename']}\"");
        header("Content-type:" . $this->contentTypes[$frow['f_ext']]);
        echo file_get_contents($absoluteFilepath);
        exit();
    }
}