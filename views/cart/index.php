<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'My Cart';
?>
<div class="cart-index">
    <div class="body-content">
        <div class="row">
            <div class="col-lg-12">
                <?php if ($items): ?>
                <?php foreach ($items as $item): ?>
                <div>
                    <?php echo Html::encode($item->getProduct()->one()->name); ?>
                    ($<?php echo number_format($item->amount, 2); ?>)
                    <?php echo Html::a('Remove', ['cart/remove', 'id' => $item->id], ['class' => 'cart-remove-link']); ?>
                </div>
                <?php endforeach; ?>
                <?php else: ?>
                <div>Cart is empty.</div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>