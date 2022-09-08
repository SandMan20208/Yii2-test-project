<?php

use common\models\ActiveRecord\Device;
use common\models\ActiveRecord\Store;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;
//use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\DeviceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Устройства';

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="device-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить Устройство', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'filterOnFocusOut' => 'true',
        'pjax' => true,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'serial_number',
            [
                'attribute' => 'store_id',
                'label' => 'Название склада',
                'filterType' => '\kartik\select2\Select2',
                'filterWidgetOptions' => [
                    'options' => ['placeholder' => 'Выберите склад'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ]
                ],
                'filter' => Store::find()->select(['store_name', 'id'])->indexBy('id')->column(),
                'value' => 'store.store_name',

            ],
            [
                'attribute' => 'created_at',
                'label' => 'Дата создания',
                'format' => ['datetime', 'php:d.m.Y H:i'],   
            ],
            
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
            ],
            'responsive'=>true,
            'hover'=>true
    ]); ?>

    <?php 
       
    ?>

</div>
