<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

    <?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'Medical',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);

            $menuItems = [
                ['label' => 'Home', 'url' => ['/site/index']],
                ['label' => 'Kontakt', 'url' => ['/site/contact']],
            ];
            if(!Yii::$app->user->isGuest){
                $menuItems = [
                    ['label' => 'Home', 'url' => ['/site/index']],
                    ['label' => 'Kontakt', 'url' => ['/site/contact']],
                    ['label' => 'Korisnici', 'url' => ['/user/index']],
                    ['label' => 'Firme Korisnika', 'url' => ['/company/index']],
                    ['label' => 'Pacijenti', 'url' => ['/pacient/index']],
                    ['label' => 'Pregledi', 'url' => ['/optometrist/index']],
                    ['label' => 'Prodaja', 'url' => ['/prodaja/index']],
                ];

            }

            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
            } else {
                $menuItems[] = [
                    'label' => Yii::$app->user->identity->username.'('.Yii::$app->company->name.')',
                    'items'=>[
                        ['label' => 'Create new user', 'url' => Url::toRoute('user/create')],
                        ['label' => 'Update own info', 'url' => Url::toRoute(['user/update','id'=>Yii::$app->user->identity->id])],
                        ['label' => 'Change company', 'url' =>Url::toRoute('company/change'),'linkOptions'=>['id'=>'modalButton']],
                        ['label' => 'Update company', 'url' => Url::toRoute(['company/update','id'=>Yii::$app->company->id])],
                        ['label' => 'Log out', 'url' =>Url::toRoute('site/logout')],

                    ]
                ];
            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end();
        ?>

        <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
        <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

<?php Modal::begin([
    'id'=>'modal',
    'size'=>'modal-lg',
    'header' => '<h2>Promena Kompanije</h2>',
    'toggleButton' => ['label' => 'click me'],
]);

    echo '<div id="modalContent"></div>';


Modal::end();?>

<script>
    $('#modalButton').click(function(e){
        e.preventDefault();
       $('#modal').modal('show').find('#modalContent').load($(this).attr('href'));
    });
</script>
