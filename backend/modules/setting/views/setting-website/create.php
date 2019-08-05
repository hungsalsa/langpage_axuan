<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\setting\models\SettingWebsite */

$this->title = 'Create Setting Website';
$this->params['breadcrumbs'][] = ['label' => 'Setting Websites', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setting-website-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'moduleType' => $moduleType,
    ]) ?>

</div>
