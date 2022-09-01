<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Device */

$this->title = 'Редактировать Склад ';
$this->params['breadcrumbs'][] = ['label' => 'Устройства', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="device-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
