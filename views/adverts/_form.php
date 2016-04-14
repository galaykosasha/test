<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Adverts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="adverts-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_login')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_password')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
