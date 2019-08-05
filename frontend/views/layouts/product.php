<?php
use yii\helpers\Html;
use frontend\assets\ProductAsset;
use frontend\widgets\mainHeader;
use frontend\widgets\headerNav;
use frontend\widgets\index\brandsCarousel;
use frontend\widgets\index\topNavigation;
use frontend\widgets\index\hotDeals;
use frontend\widgets\index\specialOffer;
use frontend\widgets\index\productTags;
use frontend\widgets\index\specialDeals;
use frontend\widgets\index\newsletter;
use frontend\widgets\index\Testimonials;
use frontend\widgets\footerWidget;

ProductAsset::register($this);
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
    <link rel="icon" type="image/ico" sizes="16x16" href="<?=Yii::$app->homeUrl ?>images/favicon.ico">
    <title><?= Html::encode($this->title).' | lopxin.com' ?></title>
    <?php $this->head() ?>
</head>
<body class="cnt-home">
    <?php $this->beginBody() ?>
    <!-- ============================================== HEADER ============================================== -->
    <header class="header-style-1">
        <?php // topMenu::widget() ?>
        <!-- ============================================== mainHeader : Start ============================================== -->
        <?= mainHeader::widget() ?>
        <!-- ============================================== mainHeader : END ============================================== -->
        <!-- ============================================== NAVBAR ============================================== -->

        <?= headerNav::widget() ?>
        <!-- ============================================== NAVBAR : END ============================================== -->
    </header>
        <!-- ============================================== HEADER : END ============================================== -->
        <div class="breadcrumb">
            <div class="container">
                <div class="breadcrumb-inner">
                    <ul class="list-inline list-unstyled">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Clothing</a></li>
                        <li class='active'>Floral Print Buttoned</li>
                    </ul>
                </div>
                <!-- /.breadcrumb-inner -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /.breadcrumb -->
    <div class="body-content outer-top-xs">
        <div class="container">
            <div class="row single-product">
                <div class="col-xs-12 col-sm-12 col-md-3 sidebar">
                    <!-- ================================== TOP NAVIGATION ================================== -->
                    <?= topNavigation::widget() ?>
                    <!-- ================================== TOP NAVIGATION : END ================================== -->
                    <!-- ============================================== HOT DEALS ============================================== -->
                    <?= hotDeals::widget() ?>
                    <!-- ============================================== HOT DEALS: END ============================================== -->
                    <!-- ============================================== SPECIAL OFFER ============================================== -->
                    <?= specialOffer::widget() ?>
                    <!-- ============================================== SPECIAL OFFER : END ============================================== -->
                    <!-- ============================================== PRODUCT TAGS ============================================== -->
                    <?= productTags::widget() ?>
                    <!-- /.sidebar-widget -->
                    <!-- ============================================== PRODUCT TAGS : END ============================================== -->
                    <!-- ============================================== SPECIAL DEALS ============================================== -->
                    <?= specialDeals::widget() ?>
                    <!-- ============================================== SPECIAL DEALS : END ============================================== -->
                    <!-- ============================================== NEWSLETTER ============================================== -->
                    <?= newsletter::widget() ?>
                    <!-- ============================================== NEWSLETTER: END ============================================== -->
                    <!-- ============================================== Testimonials============================================== -->
                    <?= Testimonials::widget() ?>
                    <!-- ============================================== Testimonials: END ============================================== -->
                    <div class="home-banner">
                        <img src="<?= Yii::$app->homeUrl?>images/banners/LHS-banner.jpg" alt="Image">
                    </div>
                </div>
                <!-- /.sidemenu-holder -->
                <!-- ============================================== SIDEBAR : END ============================================== -->
                <!-- ============================================== CONTENT ============================================== -->
                <div class="col-xs-12 col-sm-12 col-md-9">
                    <?= $content ?>
                </div>
                    <div class="clearfix"></div>
                <!-- /.homebanner-holder -->
                <!-- ============================================== CONTENT : END ============================================== -->
                
            </div>
            <!-- /.row -->
                <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            <?= brandsCarousel::widget() ?>
                <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /#top-banner-and-menu -->
    <!-- ============================================================= FOOTER ============================================================= -->
    <?= footerWidget::widget() ?>
    <!-- ============================================================= FOOTER : END============================================================= -->

    





    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>