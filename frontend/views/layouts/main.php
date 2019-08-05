<?php
use yii\helpers\Html;
use frontend\assets\AppAsset;

use frontend\widgets\footerWidget;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <?php 
    echo Html::csrfMetaTags();
    $this->registerMetaTag(['name' => 'copyright', 'content' => 'lopxin.com']);
    $this->registerMetaTag(['name' => 'author', 'content' => 'lopxin.com']);
    $this->registerMetaTag(['name' => 'robots', 'content' => 'INDEX,FOLLOW']);

    $this->registerMetaTag(Yii::$app->params['og_site_name'], 'og_site_name');
    $this->registerMetaTag(Yii::$app->params['og_type'], 'og_type');
    $this->registerMetaTag(Yii::$app->params['og_locale'], 'og_locale');
    // $this->registerMetaTag(Yii::$app->params['og_title'], 'og_title');
    // $this->registerMetaTag(Yii::$app->params['og_description'], 'og_description');
    // $this->registerMetaTag(Yii::$app->params['og_url'], 'og_url');
    // $this->registerMetaTag(Yii::$app->params['og_image'], 'og_image');
    
    $this->registerLinkTag(['rel' => 'canonical', 'href' => Yii::$app->request->absoluteUrl]); 
    ?>
    <!-- <link rel="icon" type="image/ico" sizes="16x16" href="<?=Yii::$app->homeUrl ?>images/favicon.ico"> -->
    <title><?= Html::encode($this->title)?></title>
    <?php $this->head() ?>
</head>
<body class="cnt-home">
    <?php $this->beginBody() ?>
    
    
                    <?= $content ?>
               
    <!-- ============================================================= FOOTER ============================================================= -->
    <?= footerWidget::widget() ?>
    <!-- ============================================================= FOOTER : END============================================================= -->

    





    <?php $this->endBody() ?>

    <?php 
    // if(Yii::$app->session->hasFlash('messeage')){
    //     $messeage = Yii::$app->session->getFlash('messeage');
    // }
    if($messeage = Yii::$app->session->getFlash('messeage')): 
        ?>
        <script type="text/javascript">
            $.notify({
                icon: 'pe-7s-gift',
                message: "<?= $messeage ?>"

            },{
                type: 'info',
                timer: 3200
            });
        </script>
    <?php endif; ?>
</body>

</html>
<?php $this->endPage() ?>