<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model backend\models\Register */
/* @var $form yii\widgets\ActiveForm */
$dataStatus = [0 => ' Chưa duyệt ',1=>'Đã duyệt'];
?>

<div class="register-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name',['options' => ['class' => 'col-md-3']])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone',['options' => ['class' => 'col-md-3']])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email',['options' => ['class' => 'col-md-3']])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address',['options' => ['class' => 'col-md-3']])->textInput(['maxlength' => true]) ?>
    <div class="clearfix"></div>

    <?= $form->field($model, 'product_id',['options'=>['class'=>'col-md-2']])->widget(Select2::classname(), [
        'data' => $dataProduct,
        'options' => ['placeholder' => 'Select a color ...','id'=>'register_product_id','data-url'=>Yii::$app->getUrlManager()->createUrl(['/product/getprice'])],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>
    <?= $form->field($model, 'quantity',['options' => ['class' => 'col-md-2','id'=>'register_quantity']])->textInput(['type'=>'number','min'=>0,'data-url'=>Yii::$app->getUrlManager()->createUrl(['/product/getprice'])]) ?>

    <div class="col-md-3" style="<?= ($model->product_id==1)? "display: none;":""; ?>" id="form_price">
        <label class="control-label">Giá sản phẩm / Thành tiền</label><br>
        <span class="register_price form-control" style="padding: 10px 20px"><?= (isset($model->product->price)) ? '<strong>'.Yii::$app->formatter->asDecimal($model->product->price,0).'</strong> => thành tiền : <strong>'.Yii::$app->formatter->asDecimal($model->product->price*$model->quantity,0).'</strong> <sup>đ</sup>': 0 ?></span>
    </div>

    <?= $form->field($model, 'status',['options'=>['class'=>'col-md-2']])->widget(Select2::classname(), [
        'data' => $dataStatus,
        'options' => ['placeholder' => 'Select a color ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>
    <div class="clearfix"></div>
    <?= $form->field($model, 'note')->textarea(['rows' => 6,'class'=>'content']) ?>



    <div class="form-group btn_save">
        <?= Html::submitButton($model->isNewRecord ? 'Thêm mới':'Cập nhật', ['class' => 'btn btn-success btn_luu']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title text-center" id="myLargeModalLabel">Quản lý ảnh</h4> </div>
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
<?php $this->registerJsFile("@web/tinymce/tinymce.min.js", ['depends' => [yii\web\JqueryAsset::className()]]); $this->registerJsFile("@web/js/main.js", ['depends' => [yii\web\JqueryAsset::className()]]);$this->registerJsFile("@web/js/product/register.min.js", ['depends' => [yii\web\JqueryAsset::className()]]); ?>