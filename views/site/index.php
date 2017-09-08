<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="body-content">
        <div class="row">
            <div class="col-lg-12">
                <?php foreach ($products as $product): ?>
                <div>
                    <?php echo Html::encode($product->name); ?>
                    ($<?php echo number_format($product->price, 2); ?>)
                    <?php echo Html::a('Add to Cart', ['cart/add', 'id' => $product->id], ['class' => 'cart-add-link']); ?>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php if ($cart): ?>
        <div class="row">
            <?php echo Html::a('Go to Cart (' . $cart . ')', ['cart/index'], ['class' => 'cart-link']); ?>
        </div>
        <?php endif; ?>
    </div>
</div>
