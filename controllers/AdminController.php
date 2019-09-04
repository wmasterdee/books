<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\Admin;

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
        $admin = new Admin();
        $books = $admin->getAllBooks();
        $site_variables = $admin->getMainVariables();
        Yii::$app->view->title = "Admin / Books";
        return $this->render('index.twig', ['site_variables' => $site_variables, 'books' => $books]);
    }
    
    /**
     * Displays Logins page.
     *
     * @return string
     */
    public function actionLogin()
    {
        $admin = new Admin();
        $site_variables = $admin->getMainVariables();
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
        $admin = new Admin();
        $authors = $admin->getAllAuthors();
        $site_variables = $admin->getMainVariables();
        Yii::$app->view->title = "Admin / Authors";
        return $this->render('authors.twig', ['site_variables' => $site_variables, 'authors' => $authors]);
    }
    
    /**
     * Displays Add Author
     *
     * @return Response|string
     */
    public function actionAddauthor()
    {
        $admin = new Admin();
        $request = Yii::$app->request;
        if ($request->isPost) {
            $post = $request->post();
            $admin->storeAuthorInDatabase($post['author_id'], $post['author_name'], $post['author_surname'], $post['author_birthday']);
            $this->redirect(array('admin/authors'));
        }
        $site_variables = $admin->getMainVariables();
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
        $admin = new Admin();
        $authors = $admin->getAllAuthors();
        $request = Yii::$app->request;
        if ($request->isPost) {
            $post = $request->post();
            $admin->storeBookInDatabase($post['author_id'], $post['book_name'], $post['book_id']);
            $this->redirect(array('admin/index'));
        }
        $site_variables = $admin->getMainVariables();
        Yii::$app->view->title = "Admin / Add Book";
        return $this->render('add_book.twig', ['site_variables' => $site_variables, 'authors' => $authors]);
    }
}
