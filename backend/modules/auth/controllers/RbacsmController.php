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
class RbacsmController extends Controller
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
    
    
    public function actionIndex()
    {
        $auth = Yii::$app->authManager;

        $author = $auth->createRole('author');
        $admin = $auth->createRole('admin');
        $manager = $auth->createRole('manager');

        $setting_setting_modules_index = $auth->createPermission('setting/setting-modules/index');
        $setting_setting_modules_index->description = 'Danh sách Modules sản phẩm';
        $auth->add($setting_setting_modules_index);

        $setting_setting_modules_create = $auth->createPermission('setting/setting-modules/create');
        $setting_setting_modules_create->description = 'Thêm mới Modules sản phẩm';
        $auth->add($setting_setting_modules_create);

        $setting_setting_modules_view = $auth->createPermission('setting/setting-modules/view');
        $setting_setting_modules_view->description = 'Chi tiết Modules sản phẩm';
        $auth->add($setting_setting_modules_view);

        $setting_setting_modules_update = $auth->createPermission('setting/setting-modules/update');
        $setting_setting_modules_update->description = 'Chỉnh sửa Modules sản phẩm';
        $auth->add($setting_setting_modules_update);

        $setting_setting_modules_delete = $auth->createPermission('setting/setting-modules/delete');
        $setting_setting_modules_delete->description = 'Xóa Modules sản phẩm';
        $auth->add($setting_setting_modules_delete);

        $setting_setting_modules_quickchange = $auth->createPermission('setting/setting-modules/quickchange');
        $setting_setting_modules_quickchange->description = 'Sửa nhanh Modules sản phẩm';
        $auth->add($setting_setting_modules_quickchange);

        $setting_setting_modules_statuschange = $auth->createPermission('setting/setting-modules/statuschange');
        $setting_setting_modules_statuschange->description = 'Kích hoạt Modules sản phẩm nhanh';
        $auth->add($setting_setting_modules_statuschange);




        $auth->addChild($manager, $setting_setting_modules_index);
        $auth->addChild($manager, $setting_setting_modules_create);
        $auth->addChild($manager, $setting_setting_modules_view);
        $auth->addChild($manager, $setting_setting_modules_update);
        $auth->addChild($manager, $setting_setting_modules_delete);
        $auth->addChild($manager, $setting_setting_modules_quickchange);
        $auth->addChild($manager, $setting_setting_modules_statuschange);
    }

}
