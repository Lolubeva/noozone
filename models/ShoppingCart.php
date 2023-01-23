<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shopping_cart".
 *
 * @property int $id
 * @property int $id_user
 * @property int $id_product
 * @property int $id_ordering
 *
 * @property Ordering $ordering
 * @property Product $product
 * @property User $user
 */
class ShoppingCart extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shopping_cart';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'id_product', 'id_ordering'], 'required'],
            [['id_user', 'id_product', 'id_ordering'], 'integer'],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id']],
            [['id_product'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['id_product' => 'id']],
            [['id_ordering'], 'exist', 'skipOnError' => true, 'targetClass' => Ordering::class, 'targetAttribute' => ['id_ordering' => 'id']],
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
            'id_product' => 'Продукт',
            'id_ordering' => 'Заказ',
        ];
    }

    /**
     * Gets query for [[Ordering]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrdering()
    {
        return $this->hasOne(Ordering::class, ['id' => 'id_ordering']);
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id' => 'id_product']);
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
