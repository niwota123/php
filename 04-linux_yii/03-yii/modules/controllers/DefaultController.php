<?php

namespace app\modules\controllers;

use app\modules\models\Demo;
use app\modules\models\Owner;
//use yii\base\Response;
use yii\web\Cookie;
use yii\web\Response;
use yii\helpers\Url;
use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $model = new Demo();
        $model->name = '小明';
        $model->age = '24';
        $owner = new Owner();

        $owner->name = '学生';

        $model->owner = $owner;

        //$url = Url::to(['admin/default/index']);
        $url = Url::to(['default/index','id'=>100]);


        \Yii::info('lalalalla','request');
        //return $url;
        return $this->render('index',['model'=>$model]);
    }

    public function actionDemo(){

        //return $this->redirect('/site/index');
        //设置返回类型
        \Yii::$app->response->format = Response::FORMAT_XML;

        return [
            'message' => 'hello world',
            'code' => 100,
        ];
    }

    public function actionDownload(){

        //通过别名获得真实地址
        $webPath = \Yii::getAlias('@webroot');
        //sendFile:真实地址
        return \Yii::$app->response->sendFile("$webPath/css/demo.css");
    }

    public function actionCookie(){

        \Yii::info('my custom info-log','request');


        $cookies = \Yii::$app->response->cookies;
        $cookies->add(new Cookie([
            'name' => 'cookie-demo',
            'value' => 'demodemodemo',
        ]));

        return 'cookiedemo';
    }

    public function actionFormatter(){
        $formatter = \Yii::$app->formatter;

// output: January 1, 2014
        //return $formatter->asDate('2014-01-01', 'long');
        return $formatter->asEmail('cebe@example.com');
    }

}
