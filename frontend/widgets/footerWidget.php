<?php

namespace frontend\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use Yii;
class footerWidget extends Widget
{
    public $message;

    public function init()
    {
        parent::init();
       
    }

    public function run()
    {
        $infoWebsite = Yii::$app->params['infoWebsite'] ;
        // dbg($infoWebsite);
        if (empty($infoWebsite)) {
            $models = new FSettingWebsite();
            Yii::$app->params['infoWebsite'] = $infoWebsite = $models->infoWebsite();
        }
        return $this->render('footerWidget',['footer'=>$infoWebsite['footer']]);
    }
}