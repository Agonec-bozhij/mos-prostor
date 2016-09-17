<?php
/**
 * Created by PhpStorm.
 * User: Дима
 * Date: 11.09.2016
 * Time: 2:45
 */

namespace app\models;


use yii\base\Model;
use yii\db\ActiveRecord;

class CustomerRequestObjectForm extends ActiveRecord
{
//    public $name;
//    public $email;
//    public $phone;
//    public $message;
//    public $chosen_object;
//    public $user_id;

    public static function tableName()
    {
        return 'customer_request';
    }

    public function rules() {

        return [
            [['name', 'email', 'phone'], 'required'],
            [['name', 'phone', 'message'], 'string'],
            ['email', 'email'],
            [['chosen_object', 'user_id'], 'integer']
        ];
    }

    public function attributeLabels() {

        return [
            'name' => 'Имя',
            'email' => 'Email',
            'phone' => 'Телефон',
            'message' => 'Сообщение',
            'chosen_object' => 'Идентификатор объекта'
        ];
    }
}