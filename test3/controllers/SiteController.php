<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\AddUserForm;
use app\models\EditForm;
use app\models\Users;
use app\models\Numbers;
use yii\helpers\Html;
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
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
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new Users();
        $number = new Numbers();
        $model=$model->find()->all();
        $number=$number->find()->all();

        return $this->render('index', [
            'model' => $model,
            'number'=>$number
        ]);
    }
    /*метод добавляет контакт */
     public function actionAdd()
    {
        $model = new AddUserForm();
        $usernumber = new Users();
     
         if ($model->load(Yii::$app->request->post()) && $model->validate() ) {

            
            $number = new Numbers();

            $usernumber->name=HTML::encode($model->name);
            $usernumber->lastname=HTML::encode($model->lastname);
            $usernumber->middlename=HTML::encode($model->middlename);
            
            $usernumber->save();
            $number->id_numbers=HTML::encode($usernumber->id);
            $number->numbers=HTML::encode($model->number);
            $number->save();

            return $this->render('add', [
            'model' => $model,
            'success' => true
        ]);
        }else{
           return $this->render('add', [
            'model' => $model,
            'success' => false
        ]);
       }  
    }
    /*метод редактирует основные данные контакта*/
    public function actionEdit()
    {
        
        $request = Yii::$app->request;
        $id = $request->get('id'); 
         $userselected = new Users();
         $number = new Numbers();
         
         $userselected=$userselected->find()->where(['id' => $id])->one();
 
         $model = new AddUserForm();
      
         if ($model->load(Yii::$app->request->post())){
            $userselected->name=HTML::encode($model->name);
            $userselected->lastname=HTML::encode($model->lastname);
            $userselected->middlename=HTML::encode($model->middlename);
            $userselected->save();

            $userselected=$userselected->find()->all();
            $number=$number->find()->all();
             return $this->render('index', [
                'model' => $userselected,
                'number'=>$number
             ]);

         }else{
             $model->name=HTML::encode($userselected->name);
             $model->lastname=HTML::encode($userselected->lastname);
             $model->middlename=HTML::encode($userselected->middlename);
             
             return $this->render('edit', [
                 'userselected' => $model,
                 'success'=>false,
                 'id' => $id
             ]);
         }
         
    }
    /*метод меняет и удаляет конкретный телефон*/
    public function actionChange(){
         $request = Yii::$app->request;
         $id = $request->get('id'); 
         $number = new Numbers();
         $model = new EditForm();
         $userselected = new Users();

         $number=$number->find()->where(['id' => $id])->one();
         if($model->load(Yii::$app->request->post(),'deletebutton')){ 

        $numbers = new Numbers();
        $numbers=$numbers->find()->where(['id' => $id])->one();
        $numbers->delete();

        $userselected=$userselected->find()->all();
        $number=$number->find()->all();
             return $this->render('index', [
                'model' => $userselected,
                'number'=>$number
             ]);
         }

          if ($model->load(Yii::$app->request->post())){
            $number->numbers=HTML::encode($model->number);
            $number->save();

            $userselected=$userselected->find()->all();
            $number=$number->find()->all();

            return $this->render('index', [
                 'model' => $userselected,
                 'number'=>$number
             ]);
         }else{
             $model->number=HTML::encode($number->numbers);
             return $this->render('change', [
                 'numberselected' => $model,
                 'success'=>false,
                 'id' => $id
             ]);
         }
    }
    /*метод удаляет конкретный контакт*/
    public function actionDelete(){
        $request = Yii::$app->request;
        $id = $request->get('id'); 

        $userselected = new Users();
        $number = new Numbers();
        $userselected=$userselected->find()->where(['id' => $id])->one();
        $userselected->delete();
       
       $count=Numbers::find()->where(['id_numbers' => $id])->count();
       for ($i=0; $i < $count; $i++) { 
           $number=$number->find()->where(['id_numbers' => $id])->one();
           $number->delete();
       }

        $userselected=$userselected->find()->all();
        $number=$number->find()->all();
             return $this->render('index', [
                'model' => $userselected,
                'number'=>$number
             ]);
    }
    /*Метод добавляет номер телефона*/
    public function actionAddnumber(){
        $request = Yii::$app->request;
        $id = $request->get('id'); 

        $userselected = new Users();
        $model = new AddUserForm();
        $addnumber = new Numbers();

        $addnumber=Numbers::find()->where(['id_numbers' => $id])->count();
  
        if($addnumber<10){
            if ($model->load(Yii::$app->request->post()) ) {
            
            $addnumber = new Numbers();
            $addnumber->id_numbers=HTML::encode($id);
            $addnumber->numbers=HTML::encode($model->number);
            $addnumber->save();

            $userselected=$userselected->find()->all();
        $addnumber=$addnumber->find()->all();
             return $this->render('index', [
                'model' => $userselected,
                'number'=>$addnumber
             ]);

                }else{
                   return $this->render('addnumber', [
                    'addnumber' => $model,
                    'success' => false,
                    'error'=>false
                ]);
               }
           }else{
                return $this->render('addnumber', [
                    'addnumber' => $model,
                    'error' => true
                ]);
           }
    }
}
