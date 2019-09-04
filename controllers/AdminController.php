<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\AdminsModel;

class AdminController extends Controller
{
    
    public $layout = 'admin';

    /**
     * Displays Admin's homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new AdminsModel();
        $site_variables = $model->getMainVariables();
        Yii::$app->view->title = "Admin / Index";
        return $this->render('index.twig', ['site_variables' => $site_variables]);
    }
    
    /**
     * Displays Logins page.
     *
     * @return string
     */
    public function actionLogin()
    {
        $model = new AdminsModel();
        $site_variables = $model->getMainVariables();
        Yii::$app->view->title = "Admin / Login";
        return $this->render('login.twig', ['site_variables' => $site_variables]);
    }
    
    /**
     * Displays Authors page.
     *
     * @return string
     */
    public function actionAuthors()
    {
        $model = new AdminsModel();
        $site_variables = $model->getMainVariables();
        Yii::$app->view->title = "Admin / Authors";
        return $this->render('authors.twig', ['site_variables' => $site_variables]);
    }
    
    /**
     * Displays Add Author
     *
     * @return Response|string
     */
    public function actionAddauthor()
    {
        $model = new AdminsModel();
        $request = Yii::$app->request;
        if ($request->isPost) {
            $post = $request->post();
            $model->storeAuthorInDatabase($post['author_id'], $post['author_name'], $post['author_surname'], $post['author_birthday']);
            $this->redirect(array('admin/authors'));
        }
        $site_variables = $model->getMainVariables();
        Yii::$app->view->title = "Admin / Add Author";
        return $this->render('add_author.twig', ['site_variables' => $site_variables]);
    }
    
    
    /**
     * Displays Add Book
     *
     * @return string
     */
    public function actionAddbook()
    {
        $model = new AdminsModel();
        $authors = $model->getAllAuthors();
        $request = Yii::$app->request;
        if ($request->isPost) {
            $post = $request->post();
            $model->storeBookInDatabase($post['author_id'], $post['book_name'], $post['book_id']);
            $this->redirect(array('admin/index'));
        }
        $site_variables = $model->getMainVariables();
        Yii::$app->view->title = "Admin / Add Book";
        return $this->render('add_book.twig', ['site_variables' => $site_variables, 'authors' => $authors]);
    }
    
    /**
     * Logout Action
     *
     * @return string
     */
    public function actionLogout()
    {
        
    }
}
