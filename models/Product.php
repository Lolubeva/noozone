<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property int $price
 * @property int $sale_price
 * @property int $sale_flag
 * @property string $description
 * @property string $characteristic
 * @property int $id_company
 * @property string $rating
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $id_category
 *
 * @property Category $category
 * @property Comment[] $comments
 * @property Company $company
 * @property ImgProduct[] $imgProducts
 * @property Like[] $likes
 * @property ShoppingCart[] $shoppingCarts
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'price', 'sale_price', 'sale_flag', 'description', 'characteristic', 'id_company', 'rating', 'created_at', 'updated_at', 'created_by', 'id_category'], 'required'],
            [['price', 'sale_price', 'sale_flag', 'id_company', 'created_by', 'id_category'], 'integer'],
            [['description', 'characteristic'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'rating'], 'string', 'max' => 255],
            [['id_company'], 'exist', 'skipOnError' => true, 'targetClass' => Company::class, 'targetAttribute' => ['id_company' => 'id']],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['id_category' => 'id']],
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
            'price' => 'Цена',
            'sale_price' => 'Цена со скидкой',
            'sale_flag' => 'Флаг распродажи',
            'description' => 'Описание',
            'characteristic' => 'Характеристика',
            'id_company' => 'Компания',
            'rating' => 'Рейтинг',
            'created_at' => 'Создан',
            'updated_at' => 'Обновлен',
            'created_by' => 'Созданный',
            'id_category' => 'Категория',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'id_category']);
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::class, ['id_product' => 'id']);
    }

    /**
     * Gets query for [[Company]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::class, ['id' => 'id_company']);
    }

    /**
     * Gets query for [[ImgProducts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getImgProducts()
    {
        return $this->hasMany(ImgProduct::class, ['id_product' => 'id']);
    }

    /**
     * Gets query for [[Likes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLikes()
    {
        return $this->hasMany(Like::class, ['id_product' => 'id']);
    }

    /**
     * Gets query for [[ShoppingCarts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getShoppingCarts()
    {
        return $this->hasMany(ShoppingCart::class, ['id_product' => 'id']);
    }
}
