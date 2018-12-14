<?php
namespace powerkernel\yiicoupon\v1\controllers;
use powerkernel\yiicommon\controllers\RestController;
use yii\helpers\Url;
use yii\data\ActiveDataProvider;
class DefaultController extends RestController
{
    
    public function actionIndex()
    {
      
        return[
            'success'=>true,
            'data'=>'Coupon Api'
        ];
    }
}