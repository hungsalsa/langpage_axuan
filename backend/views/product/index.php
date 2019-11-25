<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Danh sách sản phẩm';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

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
               'attribute' => 'proName',
               'format' => 'raw',
               'value'=>function ($data) {
                return Html::a(Html::encode($data->proName),Yii::$app->homeUrl.'product/update?id='.$data->id);
                },
            ],
            'price',
            'image',
            'note:ntext',
            // 'status',
            [
                'attribute' =>'status',
                'contentOptions' => ['class' => 'text-center','style'=>'width:8%'],
                'format'=>'html',
                'content' => function($model,$key,$index, $column) {
                    $classbtn = ($model->status==0)? 'btn-danger':'btn-success';
                    return Html::button(($model->status==0)?' Ẩn ':'Kích hoạt',$options = [
                        'data-id'=>$key,
                        'id'=>'status'.$key,
                        "data-url"=>Yii::$app->getUrlManager()->createUrl(['/product/statuschange']),
                        "class"=>"btn btn-block btn-outline $classbtn Quickactive change",
                    ]);
                },
            ],
            //'created_at',
            //'updated_at',
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
                    'view' => Yii::$app->user->can('product/view'),
                    'update' => Yii::$app->user->can('product/update'),
                    'delete' => Yii::$app->user->can('product/delete')
                ],
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
<?php $this->registerJsFile('@web/js/product/global.js', ['depends' => [\yii\web\JqueryAsset::class]] );