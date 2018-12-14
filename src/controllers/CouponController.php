<?php
namespace powerkernel\yiicoupon\controllers;
use yii\filters\AccessControl;
use powerkernel\yiicoupon\models\Coupon;
use yii\data\ActiveDataProvider;
/**
 * Class CouponController
 */
class CouponController extends \powerkernel\yiicommon\controllers\ActiveController
{
    public $modelClass = 'powerkernel\yiicoupon\models\Coupon';

    /**
     * @inheritdoc
     * @return array
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['access'] = [
            '__class' => AccessControl::class,
            'rules' => [
                [
                    'verbs' => ['OPTIONS'],
                    'allow' => true,
                ],
                [
                    'actions' => [ 'update', 'create', 'delete','view','index'],
                    'roles' => ['admin'],
                    'allow' => true,
                ],
                [
                    'actions' => [ 'coupon-list'],
                    'roles' => ['@'],
                    'allow' => true,
                ],
            ],
        ];
        return $behaviors;
    }
    protected function verbs()
    {
        $parents = parent::verbs();
        return array_merge(
            $parents,
            [
                'index' => ['GET'],
                'create' => ['POST'],
                'update' => ['POST'],
                'delete' => ['POST'],
                'view' => ['POST'],
            ]
        );
    }
    public function actionCouponList(){  
        $t = time();    
        $query = Coupon::find()->select(['name','description','user_limit','coupon_code','value','coupon_type','end_date'])
        ->where(['AND',['<=','start_date',(string)$t],['>=','end_date',(string)$t] ])
        ->andWhere(['status'=>'STATUS_ACTIVE'])
        ->orderBy([
            'created_at'=>SORT_DESC
        ]);;

        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
       return $dataProvider;
    }


}
