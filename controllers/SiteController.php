<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\Site;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        Yii::$app->view->title = "Authors / Books list";
        Yii::$app->name = 'Authors / Books list';
        $site = new site();
        $authors = $site->getAuthorsWithBooks();
        return $this->render('index.twig', ['authors' => $authors]);
    }

}
