<?php
namespace powerkernel\yiicoupon\v1;
class Module extends \yii\base\Module
{

    public $controllerNamespace = 'powerkernel\yiicoupon\v1\controllers';
    public $defaultRoute = 'default';

    public function init()
    {
        
        parent::init(); // TODO: Change the autogenerated stub
        $this->registerTranslations();
    }

    public function registerTranslations()
    {
        $class = 'powerkernel\yiicommon\i18n\MongoDbMessageSource';
        \Yii::$app->i18n->translations['coupon'] = [
            '__class' => $class,
            'on missingTranslation' => function ($event) {
                $event->sender->handleMissingTranslation($event);
            },
        ];
    }

    public static function t($message, $params = [], $language = null)
    {
        return \Yii::$app->getModule('coupon')->translate($message, $params, $language);
    }

    public static function translate($message, $params = [], $language = null)
    {
        return \Yii::t('coupon', $message, $params, $language);
    }

}