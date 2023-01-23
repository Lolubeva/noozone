<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ShoppingCart $model */

$this->title = 'Create Shopping Cart';
$this->params['breadcrumbs'][] = ['label' => 'Shopping Carts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shopping-cart-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
