<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\components\widget\SideMenuWidget;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Optometrist */
/* @var $form yii\widgets\ActiveForm */

?>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <?= SideMenuWidget::widget([
                'items'=>[
                    ['label'=>'Listanje Pregleda','url'=>'optometrist/index'],
                    ['label'=>'Novi Pregled','url'=>'optometrist/create'],
                    ['label'=>'Dodaj pacijenta','url'=>'pacient/create']
                ]
            ])?>
        </div>
        <div class="col-md-9">
<div class="optometrist-form">

    <?php $form = ActiveForm::begin();?>

    <?= Html::activeHiddenInput($model,'pacient_id',['id'=>'pacientId'])?>

    <?= Html::label('Pacijent','#wl',['class'=>'col-md-12','style'=>'padding-left:0'])?>

    <?= AutoComplete::widget([
        'name' => 'pacient',
        'id'=>'autocompletePacient',
        'value'=> empty($model->pacient_id)?'': $model->pacient->first_name.' '.$model->pacient->last_name,
        'clientOptions' => [
            'source' => $data,
            'autofill'=>true,
            'minLenght'=>'1',
            'select'=>new JsExpression("function(event,ui){
                $('#pacientId').val(ui.item.id);
            }"),
        'htmlOptions'=>[
            'style'=>'width:400px'
        ]
        ],
    ]);?>

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

    <?= $form->field($model, 'created_at')->widget(
        DatePicker::className(), [
        // inline too, not bad
        'inline' => false,
        'options'=>[
            'value'=>empty($model->created_at) ? date("d.m.Y") : date('d.m.Y',$model->created_at),
        ],
        // modify template for custom rendering
        //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'dd.mm.yyyy'
        ]
    ]);?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    </div>
    </div>
</div>
</div>
<style>
    #autocompletePacient{
        display: block;
        width: 100%;
        height: 34px;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
        -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    }
</style>
