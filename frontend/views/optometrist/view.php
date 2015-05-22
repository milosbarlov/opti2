<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\components\widget\SideMenuWidget;

/* @var $this yii\web\View */
/* @var $model common\models\Optometrist */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Optometrists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="optometrist-view">
<div class="container">
    <h1><?= Html::encode($model->pacient->first_name .' '.$model->pacient->last_name) ?></h1>

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
                    ['label'=>'Listanje Pregleda','url'=>'optometrist/index'],
                    ['label'=>'Novi Pregled','url'=>'optometrist/create'],
                    ['label'=>'Dodaj pacijenta','url'=>'pacient/create']
                ]
            ])?>
        </div>
        <div class="col-md-9">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            [
              'attribute'=>'pacient_id',
               'value'=>$model->pacient->first_name.' '.$model->pacient->last_name
            ],
            'dodsph',
            'dodcyl',
            'dodax',
            'dossph',
            'doscyl',
            'dosax',
            'dpd',
            'dstakla:ntext',
            'dokvir:ntext',
            'bodsph',
            'bodcyl',
            'bodax',
            'bossph',
            'boscyl',
            'bosax',
            'bpd',
            'bstakla:ntext',
            'bokvir:ntext',
            'predio',
            'vod',
            'vos',
            'note:ntext',
            'personal_note:ntext',
            'created_at',
        ],
    ]) ?>
    </div>
        </div>
    </div>

</div>
