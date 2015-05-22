<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\components\widget\SideMenuWidget;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form container">
    <div class="row">
        <div class="col-md-3" style="margin-top:17px;">
            <?= SideMenuWidget::widget([
                'items'=>[
                    ['label'=>'Lista Korisnika','url'=>'index'],
                    ['label'=>'Novi Korisnik','url'=>'create']
                ]
            ]) ?>
        </div>
            <div class="col-md-9">
                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'username')->textInput() ?>
                <?= $form->field($model, 'email')->textInput() ?>
                <?= $form->field($model, 'password_hash')->passwordInput(['type'=>'password','value'=>!(empty($model->password_hash))?$model->password_hash:'']) ?>


                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>
            </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
