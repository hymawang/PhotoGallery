<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\models\Photo */

$this->title = 'Load photo';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

     <?php if (Yii::$app->session->hasFlash('loadPhotoFormSubmitted')): ?>

    <div class="alert alert-success">
        Photo was successfully loaded.
    </div>
   
    <?php endif; ?>
    
    <p>Please fill out the following fields:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-loadphoto','options' => ['enctype' => 'multipart/form-data']]); ?>
                <?= $form->field($model, 'file_path')->fileInput() ?>            
                <?= $form->field($model, 'description')->textarea() ?>
                <div class="form-group">
                    <?= Html::submitButton('Send', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
