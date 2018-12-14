<?php

class m180903_061423_coupon extends \yii\mongodb\Migration
{
    public function up()
    {
        $col = Yii::$app->mongodb->getCollection('coupon_db');
       
    }

    public function down()
    {
        echo "m180903_061423_coupon cannot be reverted.\n";

        return false;
    }
}
