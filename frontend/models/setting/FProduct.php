<?php

namespace app\models\setting;

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
class FProduct extends \yii\db\ActiveRecord
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
            'proName' => 'Pro Name',
            'price' => 'Price',
            'image' => 'Image',
            'note' => 'Note',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'userCreated' => 'User Created',
            'userUpdated' => 'User Updated',
        ];
    }
    
    public function getAllProduct($status=true)
    {
        $data = self::find()->select(['proName','price','id'])->where('status=:status',[':status'=>$status])->orderBy(['order' => SORT_ASC])->asArray()->all();

        return [
            'dataProduct'=>ArrayHelper::map($data,'id','proName'),
            'priceProduct'=>ArrayHelper::map($data,'id','price')
        ];
    }

    public function getProductInfo($idPro,$status=true)
    {
        return self::find()->select(['proName','price','id'])->where('status=:status AND id=:id',[':status'=>$status,':id'=>$idPro])->asArray()->one();
    }
}
