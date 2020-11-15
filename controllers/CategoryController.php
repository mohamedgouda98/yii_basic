<?php

namespace app\controllers;

use app\models\Categories;
use yii\helpers\VarDumper;

class CategoryController extends \yii\web\Controller
{
    public function actionCreate()
    {
        return $this->render('create');
    }

    public function actionIndex()
    {
        /**
         * @var  $categories
         */
        $categories = Categories::find()->all();

        return $this->render('index',array('categories' => $categories));
    }

}
