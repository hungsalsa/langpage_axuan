<?php

namespace backend\modules\setting\models;

use Yii;

/**
 * This is the model class for table "tbl_setting_website".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $logo
 * @property string $google_analytics
 * @property string $email
 * @property string $hotline
 * @property int $created_at
 * @property int $updated_at
 * @property int $userCreated
 * @property int $userUpdated
 */
class SettingWebsite extends \yii\db\ActiveRecord
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
            [['title', 'description', 'logo', 'email', 'hotline'], 'required'],
            [['description','content_form','footer'], 'string'],
            [['created_at', 'updated_at', 'userCreated', 'userUpdated'], 'integer'],
            [['title', 'logo', 'google_analytics','title_form'], 'string', 'max' => 255],
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
            'logo' => 'Logo',
            'google_analytics' => 'Google Analytics',
            'email' => 'Email',
            'footer' => 'Footer',
            'hotline' => 'Hotline',
            'content_form' => 'Nội dung form đăng ký',
            'title_form' => 'Tiêu đề form đăng ký',
            'userCreated' => 'User ID',
            'created_at' => 'Ngày tạo',
            'updated_at' => 'Ngày sửa',
            'userCreated' => 'Người tạo',
            'userUpdated' => 'Người sửa',
        ];
    }
}
