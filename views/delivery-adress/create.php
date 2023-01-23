<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\DeliveryAdress $model */

$this->title = 'Create Delivery Adress';
$this->params['breadcrumbs'][] = ['label' => 'Delivery Adresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="delivery-adress-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
