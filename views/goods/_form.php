<?php

use app\models\Adverts;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Goods */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="goods-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'good_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'good_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'good_advert')
        ->dropDownList(
            ArrayHelper::map(Adverts::find()->all(), 'user_id', 'user_fio'),
            ['prompt' => Yii::t('app', 'Choice advert')]
        );
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
