<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 17.09.2016
 * Time: 0:35
 */

namespace app\modules\admin\models;


use yii\db\ActiveRecord;

class Orders extends ActiveRecord
{
    public static function tableName()
    {
        return 'customer_request';
    }

    public function rules()
    {
        return [
            [['manager_comment','name','phone','message'], 'string'],
            [['chosen_object', 'user_id', 'status'], 'number'],
            ['email', 'email']
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => '# Заявки',
            'name' => 'Имя клиента',
            'email' => 'Эл. почта',
            'phone' => 'Телефон',
            'message' => 'Сообщение клиента',
            'chosen_object' => 'Объект',
            'user_id' => 'Менеджер',
            'status' => 'Статус',
            'manager_comment' => 'Комментарий менеджера',
        ];
    }
}