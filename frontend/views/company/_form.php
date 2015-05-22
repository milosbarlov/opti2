<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\City;
use frontend\components\widget\SideMenuWidget;

/* @var $this yii\web\View */
/* @var $model common\models\Company */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="company-form">
    <div class="container">
        <div class="col-md-3" style="margin-top:25px">
            <?= SideMenuWidget::widget([
                'items'=>[
                    ['label'=>'Listanje Firmi','url'=>'index'],
                    ['label'=>'Nova Firma','url'=>'create'],
                ]
            ])?>
        </div>
        <div class="col-md-8">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'tin')->textInput(['maxlength' => 15]) ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>

        <?= $form->field($model, 'city_id')->dropDownList(City::getAllCity()) ?>

        <?= $form->field($model, 'address')->textInput(['maxlength' => 255]) ?>

        <?= $form->field($model, 'cin')->textInput(['maxlength' => 15]) ?>

        <?= $form->field($model, 'pdv')->dropDownList($model->getPdvStatus()) ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
