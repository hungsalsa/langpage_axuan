<?php

namespace backend\modules\auth\controllers;

use Yii;
use common\modules\auth\models\AuthItem;
use common\modules\auth\models\AuthItemSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RbacController implements the CRUD actions for AuthItem model.
 */
class RbacswController extends Controller
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
     * Lists all AuthItem models.
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

        $website_index = $auth->createPermission('setting/setting-website/index');
        $website_index->description = 'Danh sách xe';
        $auth->add($website_index);

        $website_create = $auth->createPermission('setting/setting-website/create');
        $website_create->description = 'Thêm mới xe';
        $auth->add($website_create);

        $website_view = $auth->createPermission('setting/setting-website/view');
        $website_view->description = 'Chi tiết xe';
        $auth->add($website_view);

        $website_update = $auth->createPermission('setting/setting-website/update');
        $website_update->description = 'Chỉnh sửa xe';
        $auth->add($website_update);

        $website_delete = $auth->createPermission('setting/setting-website/delete');
        $website_delete->description = 'Xóa xe';
        $auth->add($website_delete);

        // $website_quickchange = $auth->createPermission('setting/setting-website/quickchange');
        // $website_quickchange->description = 'Sửa nhanh xe';
        // $auth->add($website_quickchange);
        
        // $website_statuschange = $auth->createPermission('setting/setting-website/statuschange');
        // $website_statuschange->description = 'Kích hoạt nhanh xe';
        // $auth->add($website_statuschange);


        $auth->addChild($author, $website_index);
        $auth->addChild($author, $website_create);
        $auth->addChild($author, $website_view);
        $auth->addChild($author, $website_update);
        $auth->addChild($manager, $website_delete);
        // $auth->addChild($author, $website_quickchange);
        // $auth->addChild($author, $website_statuschange);
    }

}
