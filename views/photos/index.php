<?php
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ListView;
/* @var $this yii\web\View */
/* @var $model \app\models\Photo */
/* @var $provider yii\data\ActiveDataProvider  */

$this->title = 'Photo Gallery';
?>
<div class="site-index">

    <div class="body-content">

       <div class="row">

            <div class="col-lg-12">
                <h1 class="page-header">Photo Gallery</h1>
            </div>          
           
           <?php
       
       $renderPhoto = function ($model, $key, $index, $widget)
       {
           $tpl = '<div class="col-md-3 col-sm-4 col-xs-6">
                <a class="thumbnail" href="{link}">
                    <img class="img-responsive" src="{source}" alt="">
                </a>
            </div>';
           return str_replace(["{source}","{link}"],["uploads/".$model['file_path'],Url::toRoute(["photos/view",'id'=>$model['id']])],$tpl);
       };
       
        echo ListView::widget([
            'dataProvider' => $provider,
            'itemView' => $renderPhoto,            
            'summary'=>'',
            'emptyText'=>'Photos not found'
        ]); ?>
        </div>

    </div>
</div>
