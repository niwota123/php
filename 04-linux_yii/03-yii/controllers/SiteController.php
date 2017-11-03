<?php

namespace app\controllers;

use app\models\EntryForm;
use app\models\SignupForm;
use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{

    public $layout = 'sub';
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout','login','signup','demo'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login','signup','demo'],
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout','signup'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],

                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'minLength' => 4,
                'maxLength' => 4,
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionDemo(){
        return 'aaaaa';
    }
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();//验证功能

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }


        //用户实例
        //var_dump(Yii::$app->user->identity);
        //用户id
        //var_dump(Yii::$app->user->id);
        //访客
        //return var_dump(Yii::$app->user->isGuest);

//        $model = new LoginForm();
//        if (Yii::$app->request->isPost){
//            //获得用户
//            $model->load(Yii::$app->request->post());
//            $user_name = $model->username;
//
//            $user_identity = User::findOne(['username'=>$user_name]);
//            //login 两个参数:1,user-model 2,过期时间(前提已经开启了自动登录,这个时间设置的是cookie的过期时间)
//            $res = Yii::$app->user->login($user_identity);
//            if ($res){
//                //用户实例
//                var_dump(Yii::$app->user->identity);
//                //用户id
//                var_dump(Yii::$app->user->id);
//                //访客
//                return var_dump(Yii::$app->user->isGuest);
//            }
//            return var_dump($user_identity);
//        }
//
//
//        return $this->render('login',['model'=>$model]);

        //使用用户身份登录
    }

    public function actionSignup()
    {

        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                return '注册成功';
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }
    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }

        //$listData = ['a','b','c','d'];
        $listData = ['a'=>'a','b'=>'b','c'=>'c','d'=>'d'];


        return $this->render('contact', [
            'model' => $model,
            'listdata'=>$listData,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }


    //action
    public function actionSay($message='hello'){

        return $this->render('say',['message'=>$message]);
    }

    public function actionEntry(){
        $model = new EntryForm();

        if ($model->load(Yii::$app->request->post())&& $model->validate()){
            return $this->render('entry-confirm',['model'=>$model]);
        }else{
            return $this->render('entry',['model'=>$model]);
        }
    }

    public function actionHello_world(){
        //return $this->renderAjax('demo',['hello'=>'helloword']);
        //return $this->renderPartial('demo',['hello'=>'helloword']);
       return $this->render('demo',['hello'=>'helloword']);
    }

}
