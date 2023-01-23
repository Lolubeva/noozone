<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Ordering $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="ordering-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'delivery_method')->dropDownList([ 'Самовывоз' => 'Самовывоз', 'Доставка курьером' => 'Доставка курьером', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'full_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_delivery')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
