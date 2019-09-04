<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use app\models\entities\Book;
use app\models\entities\Author;

/**
 * Admins panel control class
 *
 */
class Admin extends Model
{
        
    /*
     * Get project main variables
     * 
     * return array
     */
    public function getMainVariables() {
        return array(
            'site_url' => Url::base('http')
        );
    }
    
    /*
     * Save/update authors in database
     * 
     * return
     */
    public function storeAuthorInDatabase($id, $name, $surname, $birthdate) {
        if($id != null) {
            $author = Author::findOne($id);
            $author->name = $name;
            $author->surname = $surname;
            $author->birthdate = $birthdate;
            $author->save();
        }
        else {
            $author = new Author();
            $author->name = $name;
            $author->surname = $surname;
            $author->birthdate = $birthdate;
            $author->save();
        }
    }
    
    /*
     * Save/update book in database
     * 
     * return
     */
    public function storeBookInDatabase($author_id, $book_name, $book_id) {
        if($book_id != null) {
            $books = Book::findOne($book_id);
            $books->author_id = $author_id;
            $books->name = $book_name;
            $books->save();
        }
        else {
            $books = new Book();
            $books->author_id = $author_id;
            $books->name = $book_name;
            $books->save();
        }
    }
    
    /*
     * Get all authors
     * 
     * return array
     */
    public function getAllAuthors(){
       $authors = Author::find()->orderBy('id')->all();
       $authors = ArrayHelper::toArray($authors);
       
        foreach ($authors as $id=>$val) {
           $authors[$id]['total_books'] = Book::find()->where(['author_id' => $authors[$id]['id']])->count();
       }
 
       return $authors;
    }
    
        
    /*
     * Get all books
     * 
     * return array
     */
    public function getAllBooks(){
       $books = Book::find()->orderBy('id')->all(); 
       $books = ArrayHelper::toArray($books);
       
       foreach ($books as $id=>$val) {
           $books[$id]['author'] = Author::findOne($books[$id]['author_id']);
       }
       
       return $books;
    }
}
