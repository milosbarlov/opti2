<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\components\widget\SideMenuWidget;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index container">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="container-fluid">
        <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-md-3" style="margin-top:17px;">
            <?= SideMenuWidget::widget([
                'items'=>[
                    ['label'=>'Lista Korisnika','url'=>'index'],
                    ['label'=>'Novi Korisnik','url'=>'create']
                ]
            ]) ?>
        </div>
        <div class="col-md-9">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'username',
                    'email:email',
                    'status',
                    [
                        'attribute'=>'password_hash',
                        'value'=>'password_hash',
                    ],

                   // 'password_reset_token',
                    // 'email:email',
                    // 'status',
                    // 'created_at',
                    // 'updated_at',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
        </div>
</div>
