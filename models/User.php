<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $email
 * @property int $phone
 * @property string $login
 * @property string $password
 * @property int $id_town
 * @property string $date_of_birth
 * @property string $sex
 * @property string $avatar
 * @property float $currency
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
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'phone', 'login', 'password', 'id_town', 'date_of_birth', 'sex', 'avatar', 'currency', 'role'], 'required'],
            [['phone', 'id_town'], 'integer'],
            [['date_of_birth'], 'safe'],
            [['sex'], 'string'],
            [['currency'], 'number'],
            [['email', 'login', 'password', 'avatar'], 'string', 'max' => 255],
            [['role'], 'string', 'max' => 50],
            [['id_town'], 'exist', 'skipOnError' => true, 'targetClass' => Town::class, 'targetAttribute' => ['id_town' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
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
        ];
    }

    /**
     * Gets query for [[BankCards]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBankCards()
    {
        return $this->hasMany(BankCard::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[Companies]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompanies()
    {
        return $this->hasMany(Company::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[DeliveryAdresses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDeliveryAdresses()
    {
        return $this->hasMany(DeliveryAdress::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[Likes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLikes()
    {
        return $this->hasMany(Like::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[ShoppingCarts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getShoppingCarts()
    {
        return $this->hasMany(ShoppingCart::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[Town]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTown()
    {
        return $this->hasOne(Town::class, ['id' => 'id_town']);
    }
}
