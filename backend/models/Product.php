<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "tbl_product".
 *
 * @property int $id
 * @property string $proName
 * @property int $price
 * @property string $image
 * @property string $note
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $userCreated
 * @property int $userUpdated
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['proName', 'price', 'status', 'created_at', 'updated_at', 'userCreated', 'userUpdated'], 'required'],
            [['price', 'status', 'created_at', 'updated_at', 'userCreated', 'userUpdated'], 'integer'],
            [['note'], 'string'],
            [['order'], 'number'],
            [['proName', 'image'], 'string', 'max' => 255],
            [['proName'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'proName' => 'Tên sản phẩm',
            'price' => 'Giá',
            'image' => 'Ảnh',
            'note' => 'Ghi chú',
            'order' => 'Sắp xếp',
            'status' => 'Kích hoạt',
            'created_at' => 'Ngày tạo',
            'updated_at' => 'Ngày sửa',
            'userCreated' => 'Người tạo',
            'userUpdated' => 'Người sửa',
        ];
    }

    public function getAllProduct($status=true)
    {
        return ArrayHelper::map(self::find()->select(['proName','price','id'])->where('status=:status',[':status'=>$status])->orderBy(['order' => SORT_ASC])->asArray()->all(),'id','proName');
    }

    public function getProductInfo($idPro)
    {
        return self::find()->select(['proName','price','id'])->where('id=:id',[':id'=>$idPro])->asArray()->one();
    }
}
