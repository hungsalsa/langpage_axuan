<?php

namespace backend\modules\auth\controllers;

use Yii;
use common\modules\auth\product\AuthItem;
use common\modules\auth\product\AuthItemSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RbacController implements the CRUD actions for AuthItem model.
 */
class RbacpController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];

        /*return [
            'access' => [
                'class' => AccessControl::className(),
                // 'only' => ['login', 'logout', 'signup'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule,$action)
                        {
                            $module = Yii::$app->controller->module->id;
                            $action = Yii::$app->controller->action->id;
                            $controller = Yii::$app->controller->id;
                            $route = "$module/$controller/$action";
                            $post = Yii::$app->request->post();
                            if (\Yii::$app->user->can($route)) {
                                return true;
                            }
                        }
                    ],
                    // [
                    //     'allow' => true,
                    //     'actions' => ['logout'],
                    //     'roles' => ['@'],
                    // ],
                ],
            ],
        ];*/
    }

    /**
     * Lists all AuthItem product.
     * @return mixed
     */
    // User assigment
    public function actionAssigment()
    {
        $auth = Yii::$app->authManager;
        
        $author = $auth->createRole('author');
        $admin = $auth->createRole('admin');


         // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.
        $auth->assign($author, 2);
        $auth->assign($admin, 1);
    }

    
    public function actionIndex()
    {
        $auth = Yii::$app->authManager;

        $author = $auth->createRole('author');
        $admin = $auth->createRole('admin');
        $manager = $auth->createRole('manager');

        /*$product_index = $auth->createPermission('product/index');
        $product_index->description = 'Danh sách xe';
        $auth->add($product_index);

        $product_create = $auth->createPermission('product/create');
        $product_create->description = 'Thêm mới xe';
        $auth->add($product_create);

        $product_view = $auth->createPermission('product/view');
        $product_view->description = 'Chi tiết xe';
        $auth->add($product_view);

        $product_update = $auth->createPermission('product/update');
        $product_update->description = 'Chỉnh sửa xe';
        $auth->add($product_update);

        $product_delete = $auth->createPermission('product/delete');
        $product_delete->description = 'Xóa xe';
        $auth->add($product_delete);

        $product_quickchange = $auth->createPermission('product/quickchange');
        $product_quickchange->description = 'Sửa nhanh xe';
        $auth->add($product_quickchange);
        
        $product_statuschange = $auth->createPermission('product/statuschange');
        $product_statuschange->description = 'Kích hoạt nhanh xe';
        $auth->add($product_statuschange);

        $product_validation = $auth->createPermission('product/validation');
        $product_validation->description = 'Validate sản phẩm';
        $auth->add($product_validation);

        $auth->addChild($author, $product_index);
        $auth->addChild($author, $product_create);
        $auth->addChild($author, $product_view);
        $auth->addChild($author, $product_update);
        $auth->addChild($manager, $product_delete);
        $auth->addChild($author, $product_quickchange);
        $auth->addChild($author, $product_statuschange);
        $auth->addChild($author, $product_validation);
        */

        $product_getprice = $auth->createPermission('product/getprice');
        $product_getprice->description = 'Lấy giá sản phẩm';
        $auth->add($product_getprice);

        $auth->addChild($author, $product_getprice);
    }

}
