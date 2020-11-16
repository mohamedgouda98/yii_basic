<?php

namespace app\controllers;

use app\models\Jobs;
use Yii;
use yii\filters\AccessControl;

class JobsController extends \yii\web\Controller
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

        $job = new Jobs();

        if ($job->load(Yii::$app->request->post())) {
            if ($job->validate()) {
                $job->save();
                Yii::$app->getSession()->setFlash('success', 'Job Was Add');
                return $this->redirect('index.php?r=jobs');
            }
        }

        return $this->render('create', [
            'job' => $job,
        ]);

    }

    public function actionIndex($category = 0)
    {
        if($category == 0){
            $jobs = Jobs::find()->all();
        }else{
            $jobs = Jobs::find()->where(['category_id' => $category])->all();
        }
        return $this->render('index', ['jobs' => $jobs]);
    }

}
