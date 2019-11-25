<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\setting\models\SettingModulesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Danh sách bài viết';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setting-modules-index">

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
            // 'name',
            [
               'attribute' => 'name',
               'format' => 'raw',
               'value'=>function ($data) {
                return Html::a(Html::encode($data->name),Yii::$app->homeUrl.'setting/setting-modules/update?id='.$data->id);
                },
            ],
            'order',
            [
               'attribute' => 'registration',
               'format' => 'raw',
               'value'=>function ($data) {
                    return ($data->registration == 0) ? ' Không ':' Có ';
                },
            ],
            //'date',
            //'content:ntext',
            [
               'attribute' => 'status',
               'format' => 'raw',
               'value'=>function ($data) {
                    return ($data->status == 0) ? ' Ẩn ':' Kích hoạt ';
                },
            ],
            [
                'attribute' => 'created_at',
                'format' => ['date', 'php:H:i d-m-Y']
            ],
            [
                'attribute' => 'updated_at',
                'format' => ['date', 'php:H:i d-m-Y']
            ],
            //'userCreated',
            //'userUpdated',

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Actions',
                'headerOptions' => ['style' => 'color:#337ab7;width: 6%','class'=>'text-center'],
                'contentOptions' => ['class' => 'text-center actionColumn','style' => 'font-size:18px'],
                'template' => '{view}{update}{delete}',
                'visibleButtons' => [
                    'view' => Yii::$app->user->can('setting/setting-modules/view'),
                    'update' => Yii::$app->user->can('setting/setting-modules/update'),
                    'delete' => Yii::$app->user->can('setting/setting-modules/delete')
                ],
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
