<?php

namespace app\controllers;

use app\models\Categories;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\VarDumper;

class CategoryController extends \yii\web\Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create'],
                'rules' => [
                    [
                        'actions' => ['create'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

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
