<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\OptometristSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="optometrist-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'pacient_id') ?>

    <?= $form->field($model, 'dodsph') ?>

    <?= $form->field($model, 'dodcyl') ?>

    <?= $form->field($model, 'dodax') ?>

    <?php // echo $form->field($model, 'dossph') ?>

    <?php // echo $form->field($model, 'doscyl') ?>

    <?php // echo $form->field($model, 'dosax') ?>

    <?php // echo $form->field($model, 'dpd') ?>

    <?php // echo $form->field($model, 'dstakla') ?>

    <?php // echo $form->field($model, 'dokvir') ?>

    <?php // echo $form->field($model, 'bodsph') ?>

    <?php // echo $form->field($model, 'bodcyl') ?>

    <?php // echo $form->field($model, 'bodax') ?>

    <?php // echo $form->field($model, 'bossph') ?>

    <?php // echo $form->field($model, 'boscyl') ?>

    <?php // echo $form->field($model, 'bosax') ?>

    <?php // echo $form->field($model, 'bpd') ?>

    <?php // echo $form->field($model, 'bstakla') ?>

    <?php // echo $form->field($model, 'bokvir') ?>

    <?php // echo $form->field($model, 'predio') ?>

    <?php // echo $form->field($model, 'vod') ?>

    <?php // echo $form->field($model, 'vos') ?>

    <?php // echo $form->field($model, 'note') ?>

    <?php // echo $form->field($model, 'personal_note') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
