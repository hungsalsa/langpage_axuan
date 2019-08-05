<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\setting\models\SettingWebsiteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Thông tin website';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setting-website-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p class="btn_save">
        <?= Html::a('Chi tiết', ['view', 'id' => 1], ['class' => 'btn btn-success btn_luu']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'description:ntext',
            'logo',
            'google_analytics',
            //'email:email',
            //'hotline',
            //'created_at',
            //'updated_at',
            //'userCreated',
            //'userUpdated',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
