<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_register".
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $address
 * @property int $product_id
 * @property int $quantity
 * @property string $note
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $userCreated
 * @property int $userUpdated
 */
class Register extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_register';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'phone', 'product_id', 'quantity', 'status', 'created_at', 'updated_at', 'userCreated', 'userUpdated'], 'required'],
            [['product_id', 'quantity', 'status', 'created_at', 'updated_at', 'userCreated', 'userUpdated'], 'integer'],
            [['note'], 'string'],
            [['name'], 'string', 'max' => 150],
            [['phone'], 'string', 'max' => 12],
            [['email', 'address'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Tên khách',
            'phone' => 'Số đt',
            'email' => 'Email',
            'address' => 'Địa chỉ',
            'product_id' => 'Sản phẩm',
            'quantity' => 'Số lượng',
            'note' => 'Ghi chú',
            'status' => 'Tình trạng',
            'created_at' => 'Ngày tạo',
            'updated_at' => 'Ngày sửa',
            'userCreated' => 'Người tạo',
            'userUpdated' => 'Người sửa',
        ];
    }

    public function getProduct()
    {
        return $this->hasOne(Product::className(),['id'=>'product_id']);
    }
}
