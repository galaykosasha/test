<?php

use app\models\Adverts;
use app\widgets\FlashWidget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\GoodsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Goods');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="goods-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= FlashWidget::widget(); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Goods'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'good_id',
            'good_name',
            'good_price',
            [
                'attribute' => 'good_advert',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->advert->user_fio;
                },
                'filter'=>ArrayHelper::map(Adverts::find()->all(), 'user_id', 'user_fio'),
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
