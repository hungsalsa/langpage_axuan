<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Register */

$this->title = 'Thêm mới khách hàng';
$this->params['breadcrumbs'][] = ['label' => 'Registers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="register-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'dataProduct' => $dataProduct,
    ]) ?>

</div>
