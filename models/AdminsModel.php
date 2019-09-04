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
}
