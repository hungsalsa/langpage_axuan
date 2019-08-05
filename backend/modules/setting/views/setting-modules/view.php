<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\setting\models\SettingModules */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Setting Modules', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$dataStatus = [0 => ' Hidden ',1=>' Active'];
?>
<div class="setting-modules-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p class="btn_save">
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
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
            'order',
            [
               'attribute' => 'registration',
               'format' => 'raw',
               'value'=>function ($data) {
                    return ($data->registration == 0) ? ' Không ':' Có ';
                },
            ],
            // [
            //     'attribute' => 'date',
            //     'value'=>function ($data) {
            //     return $data->date.' ---> now:  '.time() ;
            //     },
            // ],
            [
                'attribute' => 'date',
                'format' => ['date', 'php:H:i d-m-Y']
            ],
            [
                'attribute' => 'content',
                'format' => 'raw',
            ],
            [
               'attribute' => 'status',
               'format' => 'raw',
               'value'=>function ($data) use ($dataStatus) {
                return $dataStatus[$data->status];
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
            'userCreated',
            'userUpdated',
        ],
    ]) ?>

</div>
