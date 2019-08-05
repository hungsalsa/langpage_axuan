<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\setting\models\SettingWebsite */

$this->title = 'Thông tin website';
$this->params['breadcrumbs'][] = ['label' => 'Setting Websites', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="setting-website-view">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <p class="btn_save">
        <?= Html::a('Chỉnh sửa', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn_luu']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'title',
            'description:ntext',
            'content_form:html',
            'logo',
            'google_analytics',
            'email:email',
            'hotline',
            'footer',
            'created_at',
            'updated_at',
            'userCreated',
            'userUpdated',
        ],
    ]) ?>

</div>
