<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\BankCard $model */

$this->title = 'Создать банковскую карту';
$this->params['breadcrumbs'][] = ['label' => 'Банковская карта', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bank-card-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
