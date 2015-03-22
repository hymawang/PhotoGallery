<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "photos".
 *
 * @property integer $id
 * @property string $file_path
 * @property string $description
 * @property integer $rating
 */
class Photo extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'photos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['file_path','description'], 'required'],
            [['description'], 'string'],
            [['file_path'], 'file', 'skipOnEmpty' => false, 'extensions' => 'gif, jpg,jpeg,png']
        ];
    }
    
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'file_path' => 'File',
            'description' => 'Description',
        ];
    }
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['photo_id' => 'id']);
    }
    
    public function updateRating()
    {
        unset($this->comments);
        $this->rating = $this->getComments()->average('rating');
        $this->save(false);
    }
    /*
    public function afterSave($insert, $changedAttributes)
    {
        if(isset($this->logo)){
            $this->logo=UploadedFile::getInstance($this,'logo');
        if(is_object($this->logo)){
            $path=Yii::$app->basePath . '/images/';  //set directory path to save image
            $this->logo->saveAs($path.$this->id."_".$this->logo);   //saving img in folder
            $this->logo = $this->id."_".$this->logo;    //appending id to image name            
        \Yii::$app->db->createCommand()
                  ->update('organization', ['logo' => $this->logo], 'id = "'.$this->id.'"')
                  ->execute(); //manually update image name to db
            }
        }
    }*/
}
