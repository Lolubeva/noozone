<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ShoppingCart $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="shopping-cart-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_user')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\User::find()->all(), 'id', 'login')
    ) ?>

    <?= $form->field($model, 'id_product')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\Product::find()->all(), 'id', 'name')
    ) ?>

    <?= $form->field($model, 'id_ordering')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
