<?php use yii\helpers\Html;  ?>
<div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-menu hidden-xs"></i><i class="ti-close visible-xs"></i></span> <span class="hide-menu">Navigation</span></h3> </div>
                <ul class="nav" id="side-menu">
                    <li><a href="<?= Yii::$app->homeUrl ?>setting/setting-modules"><i class="icon icon-trophy fa-fw"></i> <span class="hide-menu">Bài viết</span></a></li>
                    <li><a href="<?= Yii::$app->homeUrl ?>product"><i class="ti-server fa-fw"></i> <span class="hide-menu">Sản phẩm</span></a></li>
                    <li><a href="<?= Yii::$app->homeUrl ?>register"><i class="icon-people p-r-10 fa-fw"></i> <span class="hide-menu">Khách đăng ký</span></a></li>
                    <li><a href="<?= Yii::$app->homeUrl ?>setting/setting-website/view?id=1"><i data-icon="" class="linea-icon linea-basic fa-fw"></i> <span class="hide-menu">Thông tin website</span></a></li>

                    <li><?= Html::a('<i class="mdi mdi-logout fa-fw"></i> <span class="hide-menu">Log out</span>', Yii::$app->homeUrl.'site/logout',['data-method' => 'post','class'=>'waves-effect']) ?></li>
                    <li class="devider"></li>
                </ul>
            </div>
        </div>