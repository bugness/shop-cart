<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OrderForm */
/* @var $form ActiveForm */

$this->title = Yii::t('app', 'Checkout');

?>
<div class="cart-checkout">

    <?php $form = ActiveForm::begin(); ?>

        <?php echo $form->field($model, 'first_name'); ?>
        <?php echo $form->field($model, 'last_name'); ?>
        <?php echo $form->field($model, 'email'); ?>
        <?php echo $form->field($model, 'delivery_address'); ?>
        <?php echo $form->field($model, 'notes'); ?>
    
        <div class="form-group">
            <?php echo Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']); ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- cart-checkout -->
