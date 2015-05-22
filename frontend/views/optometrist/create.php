<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Optometrist */

$this->title = 'Create Optometrist';
$this->params['breadcrumbs'][] = ['label' => 'Optometrists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="optometrist-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'data'=>$data,
    ]) ?>

</div>
