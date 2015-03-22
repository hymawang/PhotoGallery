<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "comments".
 *
 * @property integer $id
 * @property integer $photo_id
 * @property integer $rating
 * @property string $message
 * @property integer $user_id
 * @property string $name
 * @property string $email
 */
class Comment extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['photo_id', 'rating', 'name', 'email'], 'required'],
            [['photo_id', 'rating', 'user_id'], 'integer'],
            [['message'], 'string'],
            [['name', 'email'], 'string', 'max' => 255]
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
            'photo_id' => 'Photo ID',
            'rating' => 'Rating',
            'message' => 'Message',
            'user_id' => 'User ID',
            'name' => 'Name',
            'email' => 'Email',
        ];
    }
    
    public function getPhoto()
    {
        return $this->hasOne(Photo::className(), ['id' => 'photo_id']);
    }
    
    public static function getRatingOptions()
    {
        return [1=>'1',2=>'2',3=>'3',4=>'4',5=>'5'];    
    }
    
}
