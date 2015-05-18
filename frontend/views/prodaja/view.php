<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Prodaja */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Prodajas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prodaja-view">

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
            'company_id',
            'date',
            'user_id',
            'diopter',
            'glasses',
            'frame',
            'glasses_price',
            'frame_price',
            'total_price',
            'napomena:ntext',
        ],
    ]) ?>

</div>
