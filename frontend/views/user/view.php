<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\components\widget\SideMenuWidget;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">
    <div class="container">
    <h1><?= Html::encode($this->title) ?></h1>

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
    </div>
    <div class="container">
    <div class="row">
        <div class="col-sm-3">
            <?= SideMenuWidget::widget([
                'items'=>[
                ['label'=>'Lista Korisnika','url'=>'index'],
                ['label'=>'Novi Korisnik','url'=>'create']]
            ])?>
        </div>
        <div class="col-sm-9">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'username',
                  //  'auth_key',
                  //  'password_hash',
                   // 'password_reset_token',
                    'email:email',
                   // 'status',
                  //  'created_at',
                  //  'updated_at',
                ],
            ]) ?>
    </div>
    </div>
    </div>

</div>
