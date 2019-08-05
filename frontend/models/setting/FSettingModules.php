<?php

namespace app\models\setting;

use Yii;

/**
 * This is the model class for table "tbl_setting_modules".
 *
 * @property int $id
 * @property string $name
 * @property double $order
 * @property int $registration
 * @property string $date
 * @property string $content
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $userCreated
 * @property int $userUpdated
 */
class FSettingModules extends \yii\db\ActiveRecord
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
            [['order'], 'number'],
            [['registration', 'status', 'created_at', 'updated_at', 'userCreated', 'userUpdated'], 'integer'],
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
            'name' => 'Name',
            'order' => 'Order',
            'registration' => 'Form đăng ký',
            'date' => 'Date',
            'content' => 'Content',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'userCreated' => 'User Created',
            'userUpdated' => 'User Updated',
        ];
    }

    public function getAllSettingModules($status=true)
    {
        return self::find()->select(['name','registration','date','content'])->where('status=:status',[':status'=>$status])->orderBy(['order' => SORT_ASC])->asArray()->all();
    }
}
