<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */

$this->title = 'test';
?>

<div class="col-md-5">
    <?php

    $form = ActiveForm::begin([
        'id' => 'save-client',
        'options' => ['class' => 'form-horizontal'],
        'validationUrl' => ['site/validate-client-data'],
        'enableAjaxValidation' => true
    ]) ?>

    <?= $form->field($model, 'first_name')->textInput() ?>
    <?= $form->field($model, 'last_name')->textInput() ?>

    <?= $form->field($model, 'birth_date')->textInput()->input('text', ['placeholder' => '2017-04-12']) ?>
    <?= $form->field($model, 'address')->textInput() ?>
    <?= $form->field($model, 'passport')->textInput()->input('text', ['placeholder' => 'AA123456']) ?>



    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end() ?>
</div>
