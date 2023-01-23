<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property int $id
 * @property int $id_user
 * @property string $name
 * @property int $inn
 * @property string $avatar
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 *
 * @property Product[] $products
 * @property User $user
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'name', 'inn', 'avatar', 'created_at', 'updated_at', 'created_by'], 'required'],
            [['id_user', 'inn', 'created_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'avatar'], 'string', 'max' => 255],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id']],
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
            'inn' => 'ИНН',
            'avatar' => 'Аватар',
            'created_at' => 'Создан',
            'updated_at' => 'Обновлен',
            'created_by' => 'Созданный',
        ];
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::class, ['id_company' => 'id']);
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
