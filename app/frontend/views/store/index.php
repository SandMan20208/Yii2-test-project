<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;
use yii\grid\ActionColumn;
use yii\bootstrap\Dropdown;
use yii\bootstrap\Widget;
use Yii;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
use frontend\models\Store;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\StoreSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Склады';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="store-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить Склад', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    

    <?php Pjax::begin(); ?>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'filterOnFocusOut' => 'true',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            'store_name',
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
    ]); 
    ?>
    
    <?php Pjax::end(); ?>


</div>
