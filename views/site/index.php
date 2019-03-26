<?php

use app\widgets\TreeBuilder;
use yii\bootstrap\Modal;
use yii\captcha\Captcha;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\helpers\Html;


echo TreeBuilder::widget(['branches' => $branches]);

Modal::begin([
    'header' => '<h2>Показать котиков</h2>',
    'id' => 'modal',
]);
Pjax::begin(['id' => 'captchaForm', 'enablePushState' => false]);
$form = ActiveForm::begin(['options' => ['data-pjax' => true]]);
echo $form->field($verifyForm, 'verifyCode')->widget(Captcha::class, [
    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
]);
echo Html::submitButton('Продолжить', ['class' => 'btn btn-primary']);
ActiveForm::end();
Pjax::end();
Modal::end();