<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ShoppingCart $model */

$this->title = 'Update Shopping Cart: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Shopping Carts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="shopping-cart-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
