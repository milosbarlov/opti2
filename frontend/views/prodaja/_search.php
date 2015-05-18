<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\ProdajaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prodaja-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'pacient_id') ?>

    <?= $form->field($model, 'company_id') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'diopter') ?>

    <?php // echo $form->field($model, 'glasses') ?>

    <?php // echo $form->field($model, 'frame') ?>

    <?php // echo $form->field($model, 'glasses_price') ?>

    <?php // echo $form->field($model, 'frame_price') ?>

    <?php // echo $form->field($model, 'total_price') ?>

    <?php // echo $form->field($model, 'napomena') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
