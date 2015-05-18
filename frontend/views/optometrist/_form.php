<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Optometrist */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="optometrist-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pacient_id')->textInput() ?>

    <?= $form->field($model, 'dodsph')->textInput(['maxlength' => 6]) ?>

    <?= $form->field($model, 'dodcyl')->textInput(['maxlength' => 6]) ?>

    <?= $form->field($model, 'dodax')->textInput(['maxlength' => 6]) ?>

    <?= $form->field($model, 'dossph')->textInput(['maxlength' => 6]) ?>

    <?= $form->field($model, 'doscyl')->textInput(['maxlength' => 6]) ?>

    <?= $form->field($model, 'dosax')->textInput(['maxlength' => 6]) ?>

    <?= $form->field($model, 'dpd')->textInput(['maxlength' => 6]) ?>

    <?= $form->field($model, 'dstakla')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'dokvir')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'bodsph')->textInput(['maxlength' => 6]) ?>

    <?= $form->field($model, 'bodcyl')->textInput(['maxlength' => 6]) ?>

    <?= $form->field($model, 'bodax')->textInput(['maxlength' => 6]) ?>

    <?= $form->field($model, 'bossph')->textInput(['maxlength' => 6]) ?>

    <?= $form->field($model, 'boscyl')->textInput(['maxlength' => 6]) ?>

    <?= $form->field($model, 'bosax')->textInput(['maxlength' => 6]) ?>

    <?= $form->field($model, 'bpd')->textInput(['maxlength' => 6]) ?>

    <?= $form->field($model, 'bstakla')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'bokvir')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'predio')->textInput() ?>

    <?= $form->field($model, 'vod')->textInput(['maxlength' => 7]) ?>

    <?= $form->field($model, 'vos')->textInput(['maxlength' => 7]) ?>

    <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'personal_note')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
