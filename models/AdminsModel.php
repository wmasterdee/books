<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\Url;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class AdminsModel extends Model
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
            
        }
        else {
            Yii::$app->db->createCommand()->insert('authors', [
                'name' => $name,
                'surname' => $surname,
                'birthdate' => $birthdate
            ])->execute();
        }
    }
    
    /*
     * Save/update book in database
     * 
     * return
     */
    public function storeBookInDatabase($author_id, $book_name, $book_id) {
        if($book_id != null) {
            
        }
        else {
            Yii::$app->db->createCommand()->insert('books', [
                'author_id' => $author_id,
                'name' => $book_name
            ])->execute();
        }
    }
    
    /*
     * Get all authors
     * 
     * return array
     */
    public function getAllAuthors(){
       $authors = Yii::$app->db->createCommand('SELECT * FROM `authors` ORDER BY `authors`.`added` DESC ')->queryAll(); 
       return $authors;
    }
}
