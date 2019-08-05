<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\RegisterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Danh sách khách đăng ký';
$this->params['breadcrumbs'][] = $this->title;
$dataStatus = [0 => ' Chưa duyệt ',1=>'Đã duyệt'];
?>
<div class="register-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p class="btn_save">
        <?= Html::a('Thêm mới', ['create'], ['class' => 'btn btn-success btn_luu']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
               'attribute' => 'name',
               'format' => 'raw',
               'value'=>function ($data) {
                return Html::a(Html::encode($data->name),Yii::$app->homeUrl.'register/update?id='.$data->id);
                },
            ],
            'phone',
            // 'email:email',
            // 'address',
            [
                'attribute'=>'product_id',
                'value'=>'product.proName'
            ],
            [
                'attribute'=>'quantity',
                'contentOptions'=>['class'=>'text-center']
            ],
            //'note:ntext',
            [
               'attribute' => 'quantity',
               'format' => 'raw',
               'contentOptions'=>['class'=>'text-right'],
               'label'=>'Thành tiền',
               // 'value'=>'product.price',
               'value'=>function ($data) {
                return (isset($data->product->price)) ? Yii::$app->formatter->format($data->product->price*$data->quantity,['decimal', 0]):'';
                // return $data->quantity;
                },
            ],
            [
               'attribute' => 'status',
               'contentOptions'=>['class'=>'text-center'],
               'format' => 'raw',
               'value'=>function ($data) use ($dataStatus) {
                return $dataStatus[$data->status];
                },
            ],
            //'userCreated',
            //'userUpdated',
            [
                'attribute' => 'created_at',
                'contentOptions'=>['class'=>'text-center'],
                'format' => ['date', 'php:H:i d-m-Y']
            ],
            [
                'attribute' => 'updated_at',
                'contentOptions'=>['class'=>'text-center'],
                'format' => ['date', 'php:H:i d-m-Y']
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Actions',
                'headerOptions' => ['style' => 'color:#337ab7;width: 6%','class'=>'text-center'],
                'contentOptions' => ['class' => 'text-center actionColumn','style' => 'font-size:18px'],
                'template' => '{view}{update}{delete}',
                'visibleButtons' => [
                    'view' => Yii::$app->user->can('register/view'),
                    'update' => Yii::$app->user->can('register/update'),
                    'delete' => Yii::$app->user->can('register/delete')
                ],
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
