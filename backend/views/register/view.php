<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Register */

$this->title = 'Chi tiết khách : '.$model->name;
$this->params['breadcrumbs'][] = ['label' => 'Registers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$dataStatus = [0 => ' Chưa duyệt ',1=>'Đã duyệt'];
\yii\web\YiiAsset::register($this);
?>
<div class="register-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p class="btn_save">
        <?= Html::a('Chỉnh sửa', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'name',
            'phone',
            'email:email',
            'address',
            [
                'attribute'=>'product_id',
                'value'=>function ($data) {
                    return (isset($data->product->proName)) ? $data->product->proName : 'Không';
                }
            ],
            [
                'attribute'=>'product_id',
                'format' => 'raw',
                'label'=>'Đơn giá',
                'value'=>function ($data) {
                    return (isset($data->product->price)) ? '<strong class="text-info"><i>'.Yii::$app->formatter->asDecimal($data->product->price,0).'</i></strong>' : 0;
                }
            ],
            [
               'attribute' => 'quantity',
               'format' => 'raw',
               // 'value'=>'product.price',
               'value'=>function ($data) {
                // pr($data);
                    return (isset($data->quantity)) ? '<strong class="text-info"><i>'.Yii::$app->formatter->format($data->quantity,['decimal', 0]).'</i></strong>':'';
                    // return $data->product->price;
                },
            ],
            [
               'attribute' => 'quantity',
               'format' => 'raw',
               'label'=>'Thành tiền',
               // 'value'=>'product.price',
               'value'=>function ($data) {
                // pr($data);
                    return (isset($data->product->price)) ? '<strong class="text-info">'.Yii::$app->formatter->format($data->product->price*$data->quantity,['decimal', 0]).'</strong>':'';
                    // return $data->product->price;
                },
            ],

            'note:ntext',
            [
               'attribute' => 'status',
               'format' => 'raw',
               'value'=>function ($data) use ($dataStatus) {
                return $dataStatus[$data->status];
                },
            ],
            //'userCreated',
            //'userUpdated',
            [
                'attribute' => 'created_at',
                'format' => ['date', 'php:H:i d-m-Y']
            ],
            [
                'attribute' => 'updated_at',
                'format' => ['date', 'php:H:i d-m-Y']
            ],
        ],
    ]) ?>

</div>
