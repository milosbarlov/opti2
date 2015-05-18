<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Optometrist */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Optometrists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="optometrist-view">

    <h1><?= Html::encode($this->title) ?></h1>

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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'pacient_id',
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
