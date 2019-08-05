<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\checkbox\CheckboxX;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model backend\modules\setting\models\SettingWebsite */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="setting-website-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title',['options' => ['class' => 'col-md-3']])->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'google_analytics',['options' => ['class' => 'col-md-3']])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email',['options' => ['class' => 'col-md-3']])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hotline',['options' => ['class' => 'col-md-3']])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'logo',['options' => ['class' => 'col-md-3']])->textInput(['maxlength' => true,'id'=>'imageFile','placeholder'=>'Click chọn ảnh']) ?>
    <div class="col-md-1" style="height: 80px">
        <img src="<?= (isset($model->logo))? Yii::$app->request->hostInfo.'/'.$model->logo:''?>" id="previewImage" alt="" style="height: 100%">
    </div>
    <div class="clearfix"></div>
    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'title_form',['options' => ['class' => 'col-md-3']])->textInput(['maxlength' => true]) ?>
    <div class="clearfix"></div>
    <?= $form->field($model, 'content_form')->textarea(['rows' => 6,'class'=>'content']) ?>

    <?= $form->field($model, 'footer')->textarea(['rows' => 6,'class'=>'content']) ?>

    <div class="form-group btn_save">
        <?= Html::submitButton($model->isNewRecord ? 'Thêm mới':'Cập nhật', ['class' => 'btn btn-success btn_luu']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<!-- sample modal content -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Quản lý ảnh</h4> </div>
            <div class="modal-body">
                <?php 
                $user =  Yii::$app->user->identity->username;
                $auth_key =  Yii::$app->user->identity->auth_key;
                ?>
                <iframe  width="100%" height="450" frameborder="0"
                    src="../../../filemanager/dialog.php?type=1&field_id=imageFile&lang=en_EN&akey=<?= md5($user.$auth_key) ?>">
                </iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div> 
<?php $this->registerJsFile('@web/tinymce/tinymce.min.js', ['depends' => [\yii\web\JqueryAsset::class]] ); $this->registerJsFile('@web/js/main.js', ['depends' => [\yii\web\JqueryAsset::class]] );?>