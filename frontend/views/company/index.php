<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\components\widget\SideMenuWidget;



/* @var $this yii\web\View */
/* @var $searchModel common\models\search\Company */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Companies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   <div class="container">
       <div class="row">
           <div class="col-md-3" style="margin-top:17px;">
                <?= SideMenuWidget::widget([
                    'items'=>[
                        ['label'=>'Listanje Firmi','url'=>'index'],
                        ['label'=>'Nova Firma','url'=>'create'],
                    ]
                ])?>
           </div>
           <div class="col-md-9">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                       // 'id',
                        'name',
                        'tin',
                        [
                            'attribute'=>'city_id',
                            'label'=>'City',
                            'value'=>'city.name'
                        ],

                        'address',
                        // 'cin',
                        // 'pdv',

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
          </div>
       </div>
    </div>

</div>
