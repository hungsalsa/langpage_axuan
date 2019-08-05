<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\setting\FSettingWebsite;
use app\models\setting\FSettingModules;
use app\models\setting\FRegister;
use app\models\setting\FProduct;
// use common\models\LoginForm;
// use frontend\models\PasswordResetRequestForm;
// use frontend\models\ResetPasswordForm;
// use frontend\models\SignupForm;
// use frontend\models\ContactForm;
use frontend\models\product\FProductType;
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

            // 'corsFilter' => [
            //     'class' => \yii\filters\Cors::className(),
            //     'cors' => [
            //     // restrict access to
            //         'Origin' => ['http://local.langpage.vn/', 'https://local.langpage.vn/'],
            //     // Allow only POST and PUT methods
            //         'Access-Control-Request-Method' => ['POST', 'PUT'],
            //     // Allow only headers 'X-Wsse'
            //         'Access-Control-Request-Headers' => ['X-Wsse'],
            //     // Allow credentials (cookies, authorization headers, etc.) to be exposed to the browser
            //         'Access-Control-Allow-Credentials' => true,
            //     // Allow OPTIONS caching
            //         'Access-Control-Max-Age' => 3600,
            //     // Allow the X-Pagination-Current-Page header to be exposed to the browser.
            //         'Access-Control-Expose-Headers' => ['X-Pagination-Current-Page'],
            //     ],

            // ],
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
        // dbg($product);
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
        

        if (Yii::$app->request->isAjax && $register->load(Yii::$app->request->post())) {
            header('Access-Control-Allow-Origin: *; Content-Type: application/json; charset=UTF-8');
            Yii::$app->response->format = 'json';
            return ActiveForm::validate($register);
        }

        if ($register->load($post = Yii::$app->request->post())) {
            
            if($register->save()){
                Yii::$app->session->setFlash('messeage','Bạn đã đặt hàng thành công, chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất.');
                // return $this->redirect(['index']);
                return $this->redirect('/');
            }
        }
        // pr($infoWebsite);
// dbg($productType);
        // dbg($data);
        // dbg(24*60*60);
        // $cache = \Yii::$app->cache;
        // $key= "cache_productType";
        // $data = $cache->get($key);
        // if($data === false)
        // {
        //     $data = new FProductType();
        //     $data = $data->getAllType();

        //     // $data = Article::find()->all();
        //     $cache->set($key, $data,86400);
        // }
        return $this->render('index',['infoWebsite'=>$infoWebsite,'data'=>$data,'register'=>$register,'products'=>$products]);
    }

    public function actionCategory()
    {
        return $this->render('category');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
