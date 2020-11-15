<?php

namespace app\controllers;

use app\models\Categories;
use Yii;
use yii\helpers\VarDumper;

class CategoryController extends \yii\web\Controller
{
    public function actionCreate()
    {
        $category = new Categories();

        if ($category->load(Yii::$app->request->post())) {
            if ($category->validate()) {
                $category->save();
                Yii::$app->getSession()->setFlash('success', 'Category Was Added');
                return $this->redirect('index.php?r=category/index');
            }
        }

        return $this->render('create', ['category' => $category]);
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
