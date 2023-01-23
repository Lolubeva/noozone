<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "delivery_adress".
 *
 * @property int $id
 * @property int $id_user
 * @property string $name
 * @property int $id_town
 * @property string $street
 * @property string $house_number
 * @property int $flat_number
 * @property string $comment
 *
 * @property Town $town
 * @property User $user
 */
class DeliveryAdress extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'delivery_adress';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'name', 'id_town', 'street', 'house_number', 'flat_number', 'comment'], 'required'],
            [['id_user', 'id_town', 'flat_number'], 'integer'],
            [['comment'], 'string'],
            [['name', 'street', 'house_number'], 'string', 'max' => 255],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id']],
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
            'id_user' => 'Пользователь',
            'name' => 'Имя',
            'id_town' => 'Город',
            'street' => 'Улица',
            'house_number' => 'Номер дома',
            'flat_number' => 'Номер квартиры',
            'comment' => 'Комментарий',
        ];
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

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'id_user']);
    }
}
