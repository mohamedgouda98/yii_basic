<?php

namespace app\controllers;

use app\models\Jobs;

class JobsController extends \yii\web\Controller
{
    public function actionCreate()
    {
        return $this->render('create');
    }

    public function actionIndex($category)
    {
        $jobs = Jobs::find()->where(['category_id' => $category])
        ->all();
        return $this->render('index', ['jobs' => $jobs]);
    }

}
