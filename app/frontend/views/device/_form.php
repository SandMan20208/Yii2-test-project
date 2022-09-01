<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Store;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model frontend\models\Device */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="device-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'serial_numb')->textInput() ?>
    
    <?= $form->field($model, 'store_id')->widget(Select2::classname(), [
    'data' => Store::find()->select(['store_name','id'])->indexBy('id')->column(),
    'options' => ['placeholder' => 'Выбрать склад...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
