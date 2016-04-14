<?php

use app\models\Goods;
use app\models\States;
use app\widgets\FlashWidget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\OrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Orders');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= FlashWidget::widget(); ?>

    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Orders'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'order_id',
            [
                'attribute' => 'order_state',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->state->state_name;
                },
                'filter'=>ArrayHelper::map(States::find()->all(), 'state_id', 'state_name'),
            ],
            'order_add_time',
            [
                'attribute' => 'order_good',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->good->good_name;
                },
                'filter'=>ArrayHelper::map(Goods::find()->all(), 'good_id', 'good_name'),
            ],
            'order_client_phone',
            'order_client_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
