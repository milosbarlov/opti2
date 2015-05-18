<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Prodaja */

$this->title = 'Create Prodaja';
$this->params['breadcrumbs'][] = ['label' => 'Prodajas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prodaja-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
