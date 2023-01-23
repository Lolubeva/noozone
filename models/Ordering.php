<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ordering".
 *
 * @property int $id
 * @property string $delivery_method
 * @property string $full_price
 * @property int $id_delivery
 *
 * @property ShoppingCart[] $shoppingCarts
 */
class Ordering extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ordering';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['delivery_method', 'full_price', 'id_delivery'], 'required'],
            [['delivery_method'], 'string'],
            [['id_delivery'], 'integer'],
            [['full_price'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'delivery_method' => 'Способ доставки',
            'full_price' => 'Полная стоимость',
            'id_delivery' => 'Доставка',
        ];
    }

    /**
     * Gets query for [[ShoppingCarts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getShoppingCarts()
    {
        return $this->hasMany(ShoppingCart::class, ['id_ordering' => 'id']);
    }
}
