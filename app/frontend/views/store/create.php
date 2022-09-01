<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Store */

$this->title = 'Добавить Склад';
$this->params['breadcrumbs'][] = ['label' => 'Склады', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="store-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
