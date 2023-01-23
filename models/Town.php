<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "town".
 *
 * @property int $id
 * @property string $name
 *
 * @property DeliveryAdress[] $deliveryAdresses
 * @property User[] $users
 */
class Town extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'town';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
        ];
    }

    /**
     * Gets query for [[DeliveryAdresses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDeliveryAdresses()
    {
        return $this->hasMany(DeliveryAdress::class, ['id_town' => 'id']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::class, ['id_town' => 'id']);
    }
}
