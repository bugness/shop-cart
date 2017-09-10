<?php

use Yii;
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = Yii::t('app', 'My Cart');

?>
<div class="cart-index">
    <div class="body-content">
        <div class="row">
            <div class="col-lg-12">
                <?php if ($items): ?>
                <ul class="list-group">
                    <?php foreach ($items as $item): ?>
                    <li class="list-group-item">
                        <?php echo Html::encode($item->product->name); ?>
                        (<?php echo $item->getAmount('$'); ?>)
                        <span class="pull-right"><?php echo Html::a(
                            Html::tag('span', '', ['class' => 'glyphicon glyphicon-minus']),
                            ['cart/remove', 'id' => $item->id],
                            [
                                'class' => 'btn btn-default btn-xs cart-remove-link',
                                'title' => Yii::t('app', 'Remove'),
                            ]
                        ); ?></span>
                    </li>
                    <?php endforeach; ?>
                    <li class="list-group-item list-group-item-info">
                        <?php echo Yii::t('app', 'Total: {0,number,currency}', Yii::$app->cart->total()); ?>
                    </li>
                </ul>
                <?php else: ?>
                <div><?php echo Yii::t('app', 'Cart is empty.'); ?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>