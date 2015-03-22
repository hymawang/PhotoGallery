<?php

namespace app\controllers;

use Yii;
use app\models\Photo;
use app\models\Comment;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\web\Controller;

class PhotosController extends \yii\web\Controller
{
    
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['add'],
                'rules' => [                   
                    [
                        'allow' => true,
                        'actions' => ['add'],
                        'roles' => ['@'],
                    ],
                ],
            ],          
        ];
    }

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
    
    
    public function actionIndex()
    {        
        
        $provider = new ActiveDataProvider([
            'query' => Photo::find(),
           'sort' => [
                // Set the default sort by name ASC and created_at DESC.
                'defaultOrder' => [
                    'rating' => SORT_DESC,
                    'created_at' =>SORT_DESC
                ]
            ],
            'pagination' => [
                'pageSize' => 12,
            ],
        ]);
        return $this->render('index', [
             'provider' => $provider
        ]);
    }
    
    
    public function actionView()
    {
        $id = Yii::$app->request->get('id');
        if (!$id) $this->goHome ();
        $photo = Photo::findOne($id);
        if (!$photo) $this->goHome();    
        
        $provider = new ActiveDataProvider([
            'query' => $photo->getComments(),
            'sort' => [
                // Set the default sort by name ASC and created_at DESC.
                'defaultOrder' => [
                    'created_at' =>SORT_DESC
                ]
            ],
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);
        $newComment = new Comment();
        if ($newComment->load(Yii::$app->request->post())) {
            if (!Yii::$app->user->isGuest)
            {
                $newComment->email =Yii::$app->user->identity->login;
                $newComment->name = Yii::$app->user->identity->name;
                $newComment->user_id = Yii::$app->user->id;
            }
            $newComment->photo_id = $photo->id;
            if ($newComment->save())
            {
                $photo->updateRating();
               Yii::$app->session->setFlash('sendCommentFormSubmitted');
               return $this->refresh();
            }
        }
        return $this->render('view',['photo'=>$photo,'newComment'=>$newComment,'provider'=>$provider]);
    }
    
    public function actionAdd()
    {
        $model = new Photo();        
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            $model->file_path = UploadedFile::getInstance($model, 'file_path');
            if ($model->file_path && $model->validate()) { 
                $path = 'uploads';
                if (!file_exists('uploads'))
                    mkdir ('uploads');
                do
                {
                     $filename = Yii::$app->security->generateRandomString(10).'.'. $model->file_path->extension;
                }
                while(file_exists($path.'/'. $filename));
                $model->file_path->saveAs($path.'/'. $filename);
                $model->file_path = $filename;
                $model->save(false);
                Yii::$app->session->setFlash('loadPhotoFormSubmitted');
                return $this->refresh();
            }
        }     

        return $this->render('add', [
            'model' => $model,
        ]);
    }

}
