<?php

namespace backend\modules\setting\models;

use Yii;

/**
 * This is the model class for table "tbl_setting_modules".
 *
 * @property int $id
 * @property string $name
 * @property int  @property double $order
 * @property int $registration
 * @property string $date
 * @property string $content
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $userCreated
 * @property int $userUpdated
 */
class SettingModules extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_setting_modules';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'status', 'created_at', 'updated_at', 'userCreated', 'userUpdated'], 'required'],
            [['registration', 'status', 'created_at', 'updated_at', 'userCreated', 'userUpdated'], 'integer'],
            [['order'], 'number'],
            [['date'], 'safe'],
            [['content'], 'string'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Tên modules',
            'registration' => 'Đăng ký',
            'date' => 'Ngày hết hạn',
            'content' => 'Content',
            'order' => 'Sắp xếp',
            'active' => 'Kích hoạt',
            'created_at' => 'Ngày tạo',
            'updated_at' => 'Ngày sửa',
            'userCreated' => 'Người tạo',
            'userUpdated' => 'Người sửa',
        ];
    }
}
