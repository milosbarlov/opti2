<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\components\widget\SideMenuWidget;
use dosamigos\datepicker\DatePicker;
use common\models\City;

/* @var $this yii\web\View */
/* @var $model common\models\Pacient */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pacient-form">

    <div class="container">
        <div class="row">
            <div class="col-md-3" style="margin-top:25px;">
                <?= SideMenuWidget::widget([
                    'items'=>[
                        ['label'=>'Listanje Pacijenata','url'=>'index'],
                        ['label'=>'Novi Pacijent','url'=>'create'],
                    ]
                ])?>
            </div>
            <div class="col-md-9">
                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'first_name')->textInput(['maxlength' => 45]) ?>

                <?= $form->field($model, 'last_name')->textInput(['maxlength' => 100]) ?>

                <?= $form->field($model, 'birthday')->widget(
                    DatePicker::className(), [
                    // inline too, not bad
                    'inline' => false,
                    'options'=>[
                        'value'=>empty($model->birthday) ? date("d.m.Y") : date('d.m.Y',$model->birthday),
                    ],
                    // modify template for custom rendering
                    //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'dd.mm.yyyy'
                    ]
                ]);?>

                <?= $form->field($model, 'city_id')->dropDownList(City::getAllCity(),['prompt'=>'Izaberi grad']) ?>

                <?= $form->field($model, 'address')->textInput(['maxlength' => 255]) ?>

                <?= $form->field($model, 'phone')->textInput(['maxlength' => 100]) ?>

                <?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>

                <?= $form->field($model, 'pin')->textInput(['maxlength' => 20]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    </div>
        </div>
        </div>

</div>
