<?php
namespace app\models\entities;

use yii\db\ActiveRecord;

class Book extends ActiveRecord
{
    public static function tableName()
    {
        return '{{books}}';
    }
}