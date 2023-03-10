<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\DeliveryAdress $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="delivery-adress-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_user')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\User::find()->all(), 'id', 'login')
    ) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_town')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\Town::find()->all(), 'id', 'name')
    ) ?>
    <?= $form->field($model, 'street')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'house_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'flat_number')->textInput() ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
