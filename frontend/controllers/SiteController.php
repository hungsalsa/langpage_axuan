<?php
namespace frontend\controllers;

use Yii;
use yii\helpers\Url;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\setting\FSettingWebsite;
use app\models\setting\FSettingModules;
use app\models\setting\FRegister;
use app\models\setting\FProduct;
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                    'getprice' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionGetprice()
    {
        $post = Yii::$app->request->post();
        $idPro = $post['idPro'];

        $models = new FProduct();
        $products = $models->getProductInfo($idPro);
        $products['price_f'] = Yii::$app->formatter->asDecimal($products['price']);

        return json_encode($products);
    }

    public function actionIndex()
    {
        // $this->layout = 'home';
        $infoWebsite = Yii::$app->params['infoWebsite'] ;
        if (empty($infoWebsite)) {
            $models = new FSettingWebsite();
            Yii::$app->params['infoWebsite'] = $infoWebsite = $models->infoWebsite();
        }
        $models = new FSettingModules();
        $data = $models->getAllSettingModules();

        $models = new FProduct();
        $products = $models->getAllProduct();
        // dbg($products);
        $register = new FRegister();
        if (empty($products['dataProduct'])) {
            $register->product_id = 1;
            $register->quantity = 0;
        }
        $register->status = 0;
        $register->created_at = time();
        $register->updated_at = time();
        $register->userCreated = 999;
        $register->userUpdated = 999;
        
        // Gửi email khi đăng ký 
        // $email = new Sendmail();

        if (Yii::$app->request->isAjax && $register->load(Yii::$app->request->post())) {
            // header('Access-Control-Allow-Origin: *; Content-Type: application/json; charset=UTF-8');
            Yii::$app->response->format = 'json';
            return ActiveForm::validate($register);
        }

        if ($register->load($post = Yii::$app->request->post())) {
            if (!isset($post['FRegister']['quantity'])) {
                $post['FRegister']['quantity'] = 0;
            }

            if (!isset($post['FRegister']['product_id'])) {
                $post['FRegister']['product_id'] = 1;
                $productInfo = $models->getProductInfo($post['FRegister']['product_id'],false);
            }else {
                $productInfo = $models->getProductInfo($post['FRegister']['product_id']);
            }
            // pr($post['FRegister']['product_id']);
            // dbg($productInfo);
            $txtTable = '<table class="table-send" style="border-collapse: collapse;width: 800px;font-size: 18px">';
            $txtTable = '<tr> <th colspan="2" style="color: red; padding: 6px 15px;border: 1px dotted;">Có khách hàng liên hệ ngày : '.Yii::$app->formatter->asDateTime(time(),'php:d-m-Y H:i').' - trên : '.Url::home(true).'</th> </tr>';
            $txtTable .= '<tr>
            <th width="20%" style="padding: 6px 10px; text-align: left;border: 1px dotted;">Tên :</th>
            <td style="color: #0000ff; padding: 6px 15px;border: 1px dotted;">'.$post['FRegister']['name'].'</td>
            </tr>
            <tr>
            <th width="20%" style="padding: 6px 10px; text-align: left;border: 1px dotted;">Số điện thoại : </th>
            <td style="color: #0000ff; padding: 6px 15px;border: 1px dotted;">'.$post['FRegister']['phone'].'</td>
            </tr>
            <tr>
            <th width="20%" style="padding: 6px 10px; text-align: left;border: 1px dotted;">Email : </th>
            <td style="color: #0000ff; padding: 6px 15px;border: 1px dotted;">'.$post['FRegister']['email'].'</td>
            </tr>
            <tr>
            <th width="20%" style="padding: 6px 10px; text-align: left;border: 1px dotted;">Địa chỉ : </th>
            <td style="color: #0000ff; padding: 6px 15px;border: 1px dotted;">'.$post['FRegister']['address'].'</td>
            </tr>
            <tr>
            <th width="20%" style="padding: 6px 10px; text-align: left;border: 1px dotted;">Sản phẩm : </th>
            <td style="color: #0000ff; padding: 6px 15px;border: 1px dotted;">'.$productInfo['proName'].'</td>
            </tr>
            <tr>
            <th width="20%" style="padding: 6px 10px; text-align: left;border: 1px dotted;">Số lượng : </th>
            <td style="color: #0000ff; padding: 6px 15px;border: 1px dotted;">'.$post['FRegister']['quantity'].'</td>
            </tr>
            <tr>
            <th width="20%" style="padding: 6px 10px; text-align: left;border: 1px dotted;">Đơn giá : </th>
            <td style="color: #0000ff; padding: 6px 15px;border: 1px dotted;">'.Yii::$app->formatter->asDecimal($productInfo['price']).'</td>
            </tr>
            <tr>
            <th width="20%" style="padding: 6px 10px; text-align: left;border: 1px dotted;">Thành tiền : </th>
            <td style="color: #0000ff; padding: 6px 15px;border: 1px dotted;">'.Yii::$app->formatter->asDecimal($post['FRegister']['quantity']*$productInfo['price']).'</td>
            </tr>
            <tr>
            <th width="20%" style="padding: 6px 10px; text-align: left;border: 1px dotted;">Ghi chú : </th>
            <td style="color: #0000ff; padding: 6px 15px;border: 1px dotted;">'.$post['FRegister']['note'].'</td>
            </tr></table>';
            if($register->save()){
                Yii::$app->session->setFlash('messeage','Bạn đã đặt hàng thành công, chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất.');
                // return $this->redirect(['index']);
                $subject = 'Có khách hàng liên hệ ngày : '.Yii::$app->formatter->asDateTime(time(),'php:d-m-Y H:i').' - trên : '.Url::home(true);
                $this->actionSend($post['FRegister']['email'],$subject,$txtTable);
                return $this->redirect('/');
            }

        }
        
        return $this->render('index',['infoWebsite'=>$infoWebsite,'data'=>$data,'register'=>$register,'products'=>$products]);
    }
    public function actionSend($emailTo,$subject,$body) {
        $send = Yii::$app->mailer->compose()
        ->setFrom(Yii::$app->params['adminEmail'])
        ->setTo($emailTo)
        ->setCc( Yii::$app->params['adminEmail'] )
        ->setBcc( Yii::$app->params['managerEmail'] )
        ->setSubject($subject)
        ->setHtmlBody($body)
        // ->setHtmlBody('<b>HTML content <i>Ram Pukar</i></b>')
        ->send();
        if($send){
            echo "Send";
        }
    }

    // function sendEmail($subject,$body)
    // {
    //     return Yii::$app->mailer->compose()
    //     ->setTo(Yii::$app->params['adminEmail'])
    //     ->setFrom([$this->email => 'Test Thu Email'])
    //     ->setSubject($this->subject)
    //     ->setTextBody($this->body)
    //     ->send();
    // }

   
}
