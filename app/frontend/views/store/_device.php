<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

if(count($model) != 0): ?>
    <h5><?= $model[0]['store_name']?>:</h5>
    <ol>
        <?php foreach($model as $device): ?>
            <li>
                <?= Html::a(
                    'Серийный номер: '.$device['serial_number'],
                    ['device/index', 'DeviceSearch[serial_number]' => $device['serial_number']],
                    ['target'=>'_blank'],
                ); ?>
            </li>
        <?php  endforeach; ?>
    </ol>
    <?php else: ?>
        <div class="alert alert-warning" role="alert">
            Склад пуст...
        </div>
<?php endif; ?>

    
