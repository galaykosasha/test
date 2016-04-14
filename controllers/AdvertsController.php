<?php

namespace app\controllers;

use app\components\CrudController;
use Yii;
use app\models\Adverts;
use app\models\AdvertsSearch;
use yii\web\NotFoundHttpException;

/**
 * AdvertsController implements the CRUD actions for Adverts model.
 */
class AdvertsController extends CrudController
{
    protected $searchModel;

    /**
     * Lists all Orders models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->searchModel = new AdvertsSearch();
        return parent::actionIndex();
    }

    /**
     * Finds the Orders model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Adverts the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id = null)
    {
        if(isset($id)) {
            if (($model = Adverts::findOne($id)) !== null) {
                return $model;
            } else {
                throw new NotFoundHttpException('The requested page does not exist.');
            }
        } else {
            return new Adverts();
        }
    }
}
