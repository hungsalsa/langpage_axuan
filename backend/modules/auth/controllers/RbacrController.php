<?php

namespace backend\modules\auth\controllers;

use Yii;
use common\modules\auth\anhsp\AuthItem;
use common\modules\auth\anhsp\AuthItemSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RbacController implements the CRUD actions for AuthItem model.
 */
class RbacrController extends Controller
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
     * Lists all AuthItem anhsp.
     * @return miẢnh sản phẩmd
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

        $register_index = $auth->createPermission('register/index');
        $register_index->description = 'Danh sách Ảnh sản phẩm';
        $auth->add($register_index);

        $register_create = $auth->createPermission('register/create');
        $register_create->description = 'Thêm mới Ảnh sản phẩm';
        $auth->add($register_create);

        $register_view = $auth->createPermission('register/view');
        $register_view->description = 'Chi tiết Ảnh sản phẩm';
        $auth->add($register_view);

        $register_update = $auth->createPermission('register/update');
        $register_update->description = 'Chỉnh sửa Ảnh sản phẩm';
        $auth->add($register_update);

        $register_delete = $auth->createPermission('register/delete');
        $register_delete->description = 'Xóa Ảnh sản phẩm';
        $auth->add($register_delete);
        
        $register_quickchange = $auth->createPermission('register/quickchange');
        $register_quickchange->description = 'Sửa nhanh xe';
        $auth->add($register_quickchange);
        
        $register_statuschange = $auth->createPermission('register/statuschange');
        $register_statuschange->description = 'Kích hoạt nhanh xe';
        $auth->add($register_statuschange);




        $auth->addChild($author, $register_index);
        $auth->addChild($author, $register_create);
        $auth->addChild($author, $register_view);
        $auth->addChild($author, $register_update);
        $auth->addChild($manager, $register_delete);
        $auth->addChild($author, $register_statuschange);
        $auth->addChild($author, $register_quickchange);
    }

}
