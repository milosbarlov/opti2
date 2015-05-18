<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Prodaja */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prodaja-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pacient_id')->textInput() ?>

    <?= $form->field($model, 'company_id')->textInput() ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'diopter')->textInput(['maxlength' => 155]) ?>

    <?= $form->field($model, 'glasses')->textInput(['maxlength' => 155]) ?>

    <?= $form->field($model, 'frame')->textInput(['maxlength' => 155]) ?>

    <?= $form->field($model, 'glasses_price')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'frame_price')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'total_price')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'napomena')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
