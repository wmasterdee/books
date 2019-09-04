<?php
namespace app\models\entities;

use yii\db\ActiveRecord;

class Author extends ActiveRecord
{
    public static function tableName()
    {
        return '{{authors}}';
    }
}