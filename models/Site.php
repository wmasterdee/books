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
class Site extends Model
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
     * Get Authors and Books
     * 
     * return array
     */
    public function getAuthorsWithBooks(){
        $authors = Author::find()->orderBy('id')->all();
        $authors = ArrayHelper::toArray($authors);

        foreach ($authors as $id=>$val) {
           $authors[$id]['books'] = Book::find()->where(['author_id' => $authors[$id]['id']])->all();
        }
 
       return $authors;
    }
    
}
