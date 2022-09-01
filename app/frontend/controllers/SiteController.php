<?php

namespace frontend\controllers;

use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\LoginForm;
use frontend\models\Users;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public $layout = 'basic';
    /**
     * {@inheritdoc}
     */
/*    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
            'captcha' => [
                'class' => \yii\captcha\CaptchaAction::class,
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $message ='';
        $session = Yii::$app->session;
        $model = new LoginForm();
        if ($model ->load(Yii::$app->request->post())){
            $modelUser = Users::find() -> where(['username' => $model -> username])->one();

            if (password_verify($model -> password, $modelUser -> password)){
                $session['user'] = ['username' => $modelUser -> username];
                return $this -> redirect('index.php?r=store%2Findex');
            } else{
                $message = 'Неверный логин или пароль';
            }
        }
        return $this -> render('index', ['model' => $model, 'message' => $message]);
        
    }

    public function actionLoginout()
    {
        $session = Yii::$app->session;
        $session -> open();
        if (isset($session['user']))
        {
            unset($session['user']);
        } 
        $session->close();
        return $this -> redirect('index.php?r=site%2Findex');
    }

 
    
   
}
