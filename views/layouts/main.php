<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);

?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?php echo Yii::$app->language ?>">
<head>
    <meta charset="<?php echo Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo Html::csrfMetaTags(); ?>
    <title><?php echo Html::encode($this->title); ?></title>
    <?php $this->head(); ?>
</head>
<body>
<?php $this->beginBody(); ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'My Awesome Shop',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => Yii::t('app', 'Home'), 'url' => ['/site/index']],
            // ['label' => Yii::t('app', 'About'), 'url' => ['/site/about']],
            // ['label' => Yii::t('app', 'Contact'), 'url' => ['/site/contact']],
            Yii::$app->cart->count() ? (
                ['label' => Yii::t('app', 'Cart ({0,number})', Yii::$app->cart->count()), 'url' => ['/cart/index']]
            ) : (''),
            // Yii::$app->user->isGuest ? (
            //     ['label' => Yii::t('app', 'Login'), 'url' => ['/auth/login']]
            // ) : (
            //     '<li>'
            //     . Html::beginForm(['/auth/logout'], 'post')
            //     . Html::submitButton(
            //         Yii::t('app', 'Logout ({username})', ['username' => Yii::$app->user->identity->username]),
            //         ['class' => 'btn btn-link logout']
            //     )
            //     . Html::endForm()
            //     . '</li>'
            // )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?php echo Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]); ?>
        <?php echo Alert::widget(); ?>
        <?php echo $content; ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Awesome Shop <?php echo date('Y'); ?></p>
        <p class="pull-right"></p>
    </div>
</footer>

<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>
