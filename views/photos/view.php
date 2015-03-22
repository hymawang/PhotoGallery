<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\ListView;
use app\models\Comment;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $photo \app\models\Photo */
/* @var $newComment \app\models\Comment */
/* @var $provider yii\data\ActiveDataProvider  */

$this->title = 'Photo view';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>
    

        
        <div  class="row">
            <img class="img-responsive" src="uploads/<?=$photo->file_path?>" alt="">
        </div>       
    <br>
        <div class="row">
       <?php
       
       $renderComment = function ($model, $key, $index, $widget)
       {
           $tpl = '<ul class="list-group">
            <li class="list-group-item">
              <span class="badge">{rating}</span>
              <h4 class="list-group-item-heading">{name}:</h4>
              <p class="list-group-item-text">{message}</p>
            </li>
          </ul>';
           return str_replace(['{name}','{email}','{message}','{rating}'],[$model->name,$model->email,$model->message,$model->rating],$tpl);
       };
       
        echo ListView::widget([
            'dataProvider' => $provider,
            'itemView' => $renderComment,           
            'summary'=>'',
            'emptyText'=>'Comments not found'
        ]); ?>
         </div>
    <br>
         <?php if (Yii::$app->session->hasFlash('sendCommentFormSubmitted')): ?>
        <div  class="row">
            <div class="alert alert-success">
                Comment was successfully added.
            </div>
        </div>
        <?php endif; ?>
        <div  class="row" >
            <h2>Add a comment</h2>
         <?php $form = ActiveForm::begin(['id' => 'form-sendcomment']); ?>
                <?= $form->field($newComment, 'rating')->dropDownList(Comment::getRatingOptions()) ?>            
                <?= $form->field($newComment, 'message')->textarea() ?>       
             <?php if (Yii::$app->user->isGuest): ?>
                <?= $form->field($newComment, 'name') ?>           
                <?= $form->field($newComment, 'email') ?>     
            <?php endif; ?>
                <div class="form-group">
                    <?= Html::submitButton('Send', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>    
</div>
