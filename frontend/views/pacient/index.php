<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\components\widget\SideMenuWidget;
use dosamigos\datepicker\DatePicker;


/* @var $this yii\web\View */
/* @var $searchModel common\models\search\PacientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pacients';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pacient-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="container">
    <div class="row">
        <div class="col-md-3" style="margin-top:20px;">
            <?= SideMenuWidget::widget([
                'items'=>[
                    ['label'=>'Listanje Pacijenata','url'=>'index'],
                    ['label'=>'Novi Pacijent','url'=>'create'],
                ]
            ])?>
        </div>
        <div class="col-md-9">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    [
                      'attribute'=>'company_id',
                       'value'=>'company.name'
                    ],
                    'first_name',
                    'last_name',
                    [
                        'attribute'=>'birthday',
                        'value'=>function($data){ return date('d.m.Y',$data->birthday);},
                        'filter'=>DatePicker::widget([
                            'model' => $searchModel,
                            'attribute' => 'birthday',
                            'clientOptions' => [
                                'autoclose' => true,
                                'format' => 'd.m.yyyy',
                            ]
                        ]),
                        'contentOptions'=>['style'=>'width:200px;'],
                        'headerOptions'=>['style'=>'width:200px;']
                    ],
                    // 'city_id',
                    // 'address',
                    // 'phone',
                    // 'email:email',
                    // 'pin',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
        </div>
    </div>
</div>
