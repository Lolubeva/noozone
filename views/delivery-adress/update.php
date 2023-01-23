<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\DeliveryAdress $model */

$this->title = 'Update Delivery Adress: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Delivery Adresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="delivery-adress-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
