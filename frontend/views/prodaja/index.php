<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\ProdajaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Prodajas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prodaja-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Prodaja', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'pacient_id',
            'company_id',
            'date',
            'user_id',
            // 'diopter',
            // 'glasses',
            // 'frame',
            // 'glasses_price',
            // 'frame_price',
            // 'total_price',
            // 'napomena:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
