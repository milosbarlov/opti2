<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\OptometristSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Optometrists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="optometrist-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Optometrist', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'pacient_id',
            'dodsph',
            'dodcyl',
            'dodax',
            // 'dossph',
            // 'doscyl',
            // 'dosax',
            // 'dpd',
            // 'dstakla:ntext',
            // 'dokvir:ntext',
            // 'bodsph',
            // 'bodcyl',
            // 'bodax',
            // 'bossph',
            // 'boscyl',
            // 'bosax',
            // 'bpd',
            // 'bstakla:ntext',
            // 'bokvir:ntext',
            // 'predio',
            // 'vod',
            // 'vos',
            // 'note:ntext',
            // 'personal_note:ntext',
            // 'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
