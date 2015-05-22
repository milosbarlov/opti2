<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\components\widget\SideMenuWidget;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\OptometristSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Optometrists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="optometrist-index">
    <div class="container">
    <div class="row">

    <h1><?= Html::encode($this->title) ?></h1>
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

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            [
                'attribute'=>'pacient_id',
                'value'=>function($model){return $model->pacient->first_name.' '. $model->pacient->last_name;}
            ],
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
    </div>
    </div>

</div>
