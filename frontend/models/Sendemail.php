<?php
namespace app\models;
use Yii;
use yii\base\Model;

class Sendmail extends \yii\db\ActiveRecord
{
	public $form_input;
	public function rules()
	{
		return [
				['form_input','required'],
				['form_input','email'],
				['form_input','trim' ],
				
		];
	}
	public function attributeLabels()
	{
		return[
				'form_input'=>'Nhập vào email của bạn',
		];
	}
}