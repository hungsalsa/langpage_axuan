<?php

namespace frontend\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use app\models\setting\FSettingModules;

class topMenu extends Widget
{
    

    public function init()
    {
        parent::init();
       
    }

    public function run()
    {
    	$models = new FSettingModules();
    	$data = $models->getAllSettingModules();
    	// dbg($data);
         return $this->render('topMenu',['data'=>$data]);
    }
}