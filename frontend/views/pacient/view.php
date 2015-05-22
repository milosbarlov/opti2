<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\components\widget\SideMenuWidget;

/* @var $this yii\web\View */
/* @var $model common\models\Pacient */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pacients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pacient-view">
    <div class="container">

    <h1><?= Html::encode($model->first_name .' '.$model->last_name) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
     <div class="row">
         <div class="col-md-3">
            <?= SideMenuWidget::widget([
                'items'=>[
                    ['label'=>'Listanje Pacijenata','url'=>'index'],
                    ['label'=>'Novi Pacijent','url'=>'create'],
                ]
            ])?>
         </div>
         <div class="col-md-9">

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    [
                        'attribute'=>'city_id',
                        'value'=>$model->city->name,
                    ],
                    'first_name',
                    'last_name',
                    'birthday',
                    'address',
                    'phone',
                    'email:email',
                    'pin',
                ],
            ]) ?>
             </div>
        </div>
    </div>

</div>
