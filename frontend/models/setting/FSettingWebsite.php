<?php

namespace app\models\setting;

use Yii;

/**
 * This is the model class for table "tbl_setting_website".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $content_form
 * @property string $logo
 * @property string $google_analytics
 * @property string $email
 * @property string $hotline
 * @property int $created_at
 * @property int $updated_at
 * @property int $userCreated
 * @property int $userUpdated
 */
class FSettingWebsite extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_setting_website';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'logo', 'email', 'hotline', 'created_at', 'updated_at', 'userCreated', 'userUpdated'], 'required'],
            [['description', 'content_form','footer'], 'string'],
            [['created_at', 'updated_at', 'userCreated', 'userUpdated'], 'integer'],
            [['title', 'logo', 'google_analytics'], 'string', 'max' => 255],
            [['email'], 'string', 'max' => 100],
            [['hotline'], 'string', 'max' => 11],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'content_form' => 'Content Form',
            'logo' => 'Logo',
            'google_analytics' => 'Google Analytics',
            'email' => 'Email',
            'footer' => 'footer',
            'hotline' => 'Hotline',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'userCreated' => 'User Created',
            'userUpdated' => 'User Updated',
        ];
    }

    public function infoWebsite()
    {
        return self::find()->select(['title','description','content_form','logo','google_analytics','hotline','email','footer'])->asArray()->one();
    }
}
