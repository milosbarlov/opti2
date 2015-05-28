<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\City;
use frontend\components\widget\SideMenuWidget;

/* @var $this yii\web\View */
/* @var $model common\models\Company */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="container">
        <div class="row">
            <div class="col-md-3" style="margin-top:45px;">
                <?= SideMenuWidget::widget([
                    'items'=>[
                        ['label'=>'Listanje Firmi','url'=>'index'],
                        ['label'=>'Nova Firma','url'=>'create'],
                    ]
                ])?>
            </div>
            <div class="col-md-9">
                <p>
                    <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </p>

                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id',
                        'tin',
                        'name',
                        [
                            'attribute'=>'city_id',
                            'value'=>$model->city->name,
                        ],
                        [
                          'attribute'=>'defaultUserCompany',
                           'label'=>'Default',
                           'value'=>empty($model->defaultUserCompany->is_default)?'Ne':'Da',
                        ],
                        'address',
                        'cin',
                        [
                            'attribute'=>'cin',
                            'value'=>$model->getPdvName($model->pdv),
                        ]
                    ],
                ]) ?>
           </div>
       </div>
    </div>
</div>
