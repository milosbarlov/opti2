<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Optometrist */

$this->title = 'Update Optometrist: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Optometrists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="optometrist-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
