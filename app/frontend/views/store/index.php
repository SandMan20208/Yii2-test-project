<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;
use yii\grid\ActionColumn;
use yii\bootstrap\Dropdown;
use yii\bootstrap\Widget;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
use yii\bootstrap5\Modal;
//use common\models\ActiveRecord\Store;

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

    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'filterOnFocusOut' => 'true',
        'pjax' => true,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'store_name',
                'format' => 'raw',
                'label' => 'Название склада',
                'value' => function($data){
                    return Html::tag('span', $data->store_name, ['class' => 'device-list']);
                },
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
    ]);?>

	<?php Modal::begin([
            'id' => 'device',
        ]);     
    ?>

    <div class="modal-body__title">
        
    </div>
    <?php Modal::end(); ?>
<?php
    $this->registerJs("
        $('#device').find('.modal-header').prepend('<h4>Список устройств</h4>');
        $('.device-list').on('click', function(){
            let data = $(this).parent().parent().data();
            $('#device').modal('show');
            $('#device').find('.modal-body').load('/store/device?id=' + data.key);
        });
    ");
?>

</div>
