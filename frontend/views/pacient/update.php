<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Pacient */

$this->title = 'Update Pacient: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pacients', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pacient-update">

    <h1><?= Html::encode('Update '.$model->first_name) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
