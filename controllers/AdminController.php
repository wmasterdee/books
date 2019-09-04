<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\Admin;
use app\models\entities\Book;
use app\models\entities\Author;

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
     * Remove Book.
     *
     * @return string
     */
    public function actionRemovebook()
    {
        $request = Yii::$app->request;
        if ($request->isPost) {
            $post = $request->post();
            
            $book = Book::findOne($post['id']);
            $book->delete();
        }
        return null;
    }
    
    /**
     * Remove Author.
     *
     * @return string
     */
    public function actionRemoveauthors()
    {
        $request = Yii::$app->request;
        if ($request->isPost) {
            $post = $request->post();  
            
            $author = Author::findOne($post['id']);
            $author->delete();
            
            Book::deleteAll(['author_id' => $post['id']]);
        }
        return null;
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
