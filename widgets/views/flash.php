<?php
/**
 * Created by PhpStorm.
 * User: Lee
 * Date: 14.04.16
 * Time: 18:45
 * @var $this yii\web\View
 */
use yii\helpers\Html;
?>

<?php if(\Yii::$app->session->hasFlash('success')): ?>
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-check"></i> <?= Yii::t('app', 'Success'); ?>!</h4>
    <?= \Yii::$app->session->getFlash('success'); ?>
</div>
<?php elseif(Yii::$app->session->hasFlash('error')): ?>
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i> <?= Yii::t('app', 'Error'); ?>!</h4>
        <?= \Yii::$app->session->getFlash('error'); ?>
    </div>
<?php endif; ?>