<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
$this->title = 'Làm landing page';
?>
<?php if (!empty($data)): ?>
<?php foreach ($data as $key => $value): ?>

<section id="zone-<?= $key+1 ?>">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <!-- Đoạn sau trình bày trong khung soạn thảo -->
          <h1><?= $value['name'] ?></h1>
          <p><?= $value['content'] ?></p>
          <!-- /end -->
        </div>
      </div>
    </div>
    <?php if ($value['registration'] == 1 && $value['date'] >= time()): ?>
      
      <section id="countdown-<?= $key+1 ?>">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h2 style="text-align: center;">Chương trình sẽ kết thúc sau</h2>
              <p id="demo-<?= $key+1 ?>" style="text-align: center;font-size: 60px;margin-top: 0px;"></p>
              <script>
                // Set the date we're counting down to
                var countDownDate_<?= $key ?> = new Date("<?= date("F j, Y G:i:s",$value['date']) ?>").getTime();

                // Update the count down every 1 second
                var x = setInterval(function() {

                  // Get today's date and time
                  var now = new Date().getTime();
                    
                  // Find the distance between now and the count down date
                  var distance = countDownDate_<?= $key ?> - now;
                  // Time calculations for days, hours, minutes and seconds
                  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                    
                  // Output the result in an element with id="demo"
                  document.getElementById("demo-<?= $key+1 ?>").innerHTML = days + "ngày " + hours + "giờ "
                  + minutes + "phút " + seconds + "giây ";
                    
                  // If the count down is over, write some text 
                  if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("demo-<?= $key+1 ?>").innerHTML = "Chương trình đã kết thúc";
                  }
                }, 1000);
              </script>
            </div>
          </div>
        </div>
      </section>

      <?php if ($value['date'] >= time()): ?>
      <section id="form-<?= $key+1 ?>">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <!-- Button trigger modal -->
              <div class="register text-center"><button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                Đăng ký
              </button></div>
            </div>
          </div>
        </div>
      </section>
      <?php endif ?>
      
  <?php endif ?>
  </section>

  <?php endforeach ?>
<?php endif ?>
  
  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="myModalLabel">Đăng ký tham dự chương trình</h4>
        </div>
        <div class="modal-body">
        	<p><?= $infoWebsite['content_form'] ?></p>

        	<?php $form = ActiveForm::begin(['enableClientValidation' => true, 'enableAjaxValidation' => false]); ?>

        	<?= $form->field($register, 'name')->textInput(['maxlength' => true]) ?>

        	<?= $form->field($register, 'phone')->textInput() ?>

        	<?= $form->field($register, 'email')->textInput(['type'=>'email']) ?>

        	<?= $form->field($register, 'address')->textInput() ?>

			<?php if (!empty($products['dataProduct'])): ?>

        	<?= $form->field($register, 'product_id')->widget(Select2::classname(), [
                'data' => $products['dataProduct'],
                'options' => ['placeholder' => 'Select a color ...','id'=>'register_product_id','data-url'=>Yii::$app->getUrlManager()->createUrl(['/site/getprice'])],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]) ?>

        	<?= $form->field($register, 'quantity',['options'=>['id'=>'form_quantity']])->textInput(['id'=>'register_quantity','data-url'=>Yii::$app->getUrlManager()->createUrl(['/site/getprice'])]) ?>
			
			<?php endif ?>
        	<p id="result"></p>

    		<div class="clearfix"></div>
    		<?= $form->field($register, 'note')->textarea(['rows' => 6]) ?>

    		<div class="form-group btn_save">
    			<?= Html::submitButton($register->isNewRecord ? 'Đăng ký':'Cập nhật', ['class' => 'btn btn-success btn_luu']) ?>
    		</div>

    		<?php ActiveForm::end(); ?>

          </div>
        </div>
      </div>
    </div>