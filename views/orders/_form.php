<?php

use app\models\Goods;
use app\models\States;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Orders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'order_state')->textInput()
        ->dropDownList(
            ArrayHelper::map(States::find()->all(), 'state_id', 'state_name'),
            ['prompt' => Yii::t('app', 'Choice state')]
        ); ?>

    <?= $form->field($model, 'order_add_time')->textInput() ?>

    <?= $form->field($model, 'order_good')->textInput()
        ->dropDownList(
            ArrayHelper::map(Goods::find()->all(), 'good_id', 'good_name'),
            ['prompt' => Yii::t('app', 'Choice goods')]
        ); ?>

    <?= $form->field($model, 'order_client_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_client_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
