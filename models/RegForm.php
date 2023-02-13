<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $email
 * @property string $phone
 * @property string $login
 * @property string $password
 * @property int $id_town
 * @property string $date_of_birth
 * @property string $sex
 * @property string $avatar
 * @property string $currency
 * @property string $role
 *
 * @property BankCard[] $bankCards
 * @property Comment[] $comments
 * @property Company[] $companies
 * @property DeliveryAdress[] $deliveryAdresses
 * @property Like[] $likes
 * @property ShoppingCart[] $shoppingCarts
 * @property Town $town
 */
class RegForm extends User
{
    public $passwordConfirm;
    public $agree;


    public function rules()
    {
        return [
            [['email', 'phone', 'login', 'password', 'passwordConfirm', 'id_town', 'date_of_birth', 'sex', 'avatar', 'currency', 'role'], 'required', 'message' => 'Поле обязательно для заполнения'],
            [['id_town'], 'integer'],
            ['login', 'match', 'pattern' => '/^[a-z]\w*$/i', 'message' => 'Логин начинается с буквы и содержит только латинские буквенные символы, числовые символы и знак подчеркивания'],
            ['login', 'unique', 'message' => 'Такой логин уже используется'],
            ['email', 'email', 'message' => 'Некоректный email-адресс'],
            ['passwordConfirm', 'compare', 'compareAttribute' => 'password', 'message' => 'Пароль должен совпадать'],
            ['agree', 'boolean'],
            ['agree', 'compare', 'compareValue' => true, 'message' => 'Необходимо согласиться'],
            [['phone'], 'string', 'max' => 100],
            [['date_of_birth'], 'safe'],
            [['sex'], 'string'],
            [['currency'], 'string'],
            [['email', 'login', 'password', 'avatar'], 'string', 'max' => 255],
            [['role'], 'string', 'max' => 50],
            [['id_town'], 'exist', 'skipOnError' => true, 'targetClass' => Town::class, 'targetAttribute' => ['id_town' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Электронная почта',
            'phone' => 'Номер телефона',
            'login' => 'Логин',
            'password' => 'Пароль',
            'id_town' => 'Город',
            'date_of_birth' => 'Дата рождения',
            'sex' => 'Пол',
            'avatar' => 'Аватар',
            'currency' => 'Валюта',
            'role' => 'Роль',
            'passwordConfirm' => 'Подтверждение пароля',
            'agree' => 'Даю соглясие на обработку данных',
        ];
    }
}