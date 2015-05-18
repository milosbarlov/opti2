<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Pacient */

$this->title = 'Create Pacient';
$this->params['breadcrumbs'][] = ['label' => 'Pacients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pacient-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
