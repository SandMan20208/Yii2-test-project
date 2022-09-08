<?php
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
/** @var yii\web\View $this */

$this->title = 'My Yii Application';

?>


    <div class="body-content">
        <div class="login-form">
            <div class="login-form__logo">
                <img class="login-form__logo" src="../image/logo.jpg" alt="cat">
            </div>
            <div class="login-form__input-container">
                <?php $form = ActiveForm::begin(['id' => 'login-form']) ?>
                    <?= $form->field($model, 'username') -> label(false, ['style'=>'display:none']) -> input('text', ['class' => 'login-form__input','placeholder'=>'Введите логин', 'template' =>'{input}{error}']) ?>
                    <?= $form->field($model, 'password') -> label(false, ['style'=>'display:none']) -> passwordInput(['class' => 'login-form__input','placeholder'=>'Введите пароль', 'template' =>'{input}{error}']) ?>
                    <?= Html::submitButton('Вход', ['class' => 'login-form__button', 'name' => 'login-button' ]) ?>
                <?php ActiveForm::end() ?> 
            </div>
        </div>
    </div>
