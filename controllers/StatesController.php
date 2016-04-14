<?php

namespace app\controllers;

use app\components\CrudController;
use Yii;
use app\models\States;
use app\models\StatesSearch;
use yii\web\NotFoundHttpException;

/**
 * StatesController implements the CRUD actions for States model.
 */
class StatesController extends CrudController
{
    protected $searchModel;

    /**
     * Lists all Orders models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->searchModel = new StatesSearch();
        return parent::actionIndex();
    }

    /**
     * Finds the Orders model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return States the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id = null)
    {
        if(isset($id)) {
            if (($model = States::findOne($id)) !== null) {
                return $model;
            } else {
                throw new NotFoundHttpException('The requested page does not exist.');
            }
        } else {
            return new States();
        }
    }
}
