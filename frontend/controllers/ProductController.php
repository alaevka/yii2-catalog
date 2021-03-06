<?php

namespace robote13\catalog\frontend\controllers;

use robote13\yii2components\web\FrontendControllerAbstract;

/**
 * Default controller for the `shop-catalog` module
 */
class ProductController extends FrontendControllerAbstract
{
    public function getModelClass()
    {
        return 'robote13\catalog\models\Product';
    }

    public function getSearchClass()
    {
        \Yii::$container->set('robote13\catalog\forms\ProductSearch',['defaultOrder'=>['popularity'=>SORT_DESC]]);
        return 'robote13\catalog\forms\ProductSearch';
    }

    public function actionView($id)
    {
        $this->findModelCallback = function ($query,$id){
            return $query->bySlug($id);
        };
        return parent::actionView($id);
    }
}
