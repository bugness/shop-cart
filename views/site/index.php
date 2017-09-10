<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="body-content">
        <?php $cart = Yii::$app->cart->count(); ?>
        <?php if ($cart): ?>
        <div class="alert alert-info" role="alert">
            <?php echo Html::a('Go to Cart (' . $cart . ')', ['cart/index'], ['class' => 'cart-link']); ?>
        </div>
        <?php endif; ?>
        <div class="row">
            <?php foreach ($products as $product): ?>
            <div class="col-sm-6 col-lg-3">
                <div class="thumbnail">
                    <img alt="No Image" data-src="holder.js/300x300?text=No Image&amp;auto=yes">
                    <div class="caption">
                        <b><?php echo Html::encode($product->name); ?></b>
                        <p><?php echo Html::a(
                        Html::tag('span', '', ['class' => 'glyphicon glyphicon-shopping-cart']),
                        ['cart/add', 'id' => $product->id],
                        [
                            'class' => 'btn btn-default btn-xs cart-add-link',
                            'title' => Yii::t('app', 'Add to Cart'),
                        ]
                    ); ?>&nbsp;<?php echo $product->getPrice('$'); ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
