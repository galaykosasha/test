<?php

namespace app\controllers;

use app\components\CrudController;
use Yii;
use app\models\Goods;
use app\models\GoodsSearch;
use yii\web\NotFoundHttpException;

/**
 * GoodsController implements the CRUD actions for Goods model.
 */
class GoodsController extends CrudController
{
    protected $searchModel;

    /**
     * Lists all Orders models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->searchModel = new GoodsSearch();
        return parent::actionIndex();
    }

    /**
     * Finds the Orders model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Goods the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id = null)
    {
        if(isset($id)) {
            if (($model = Goods::findOne($id)) !== null) {
                return $model;
            } else {
                throw new NotFoundHttpException('The requested page does not exist.');
            }
        } else {
            return new Goods();
        }
    }
}
