<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app', 'Signup');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="user-signup">
    <h1><?php echo Html::encode($this->title); ?></h1>

    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

        <?php echo $form->field($model, 'email')->textInput(['autofocus' => true]); ?>
        <?php echo $form->field($model, 'password')->passwordInput(); ?>

        <div class="form-group">
            <?php echo Html::submitButton(Yii::t('app', 'Signup'), ['class' => 'btn btn-primary', 'name' => 'signup-button']); ?>
        </div>

    <?php ActiveForm::end(); ?>
</div>