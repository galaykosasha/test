<?php

namespace app\components;
use yii\db\ActiveRecord;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

abstract class CrudController extends Controller
{
    protected $model;

    protected $searchModel;

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'create', 'update', 'delete'],
                'rules' => [
                    [
                        'actions' => ['index', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all States models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = $this->searchModel->search(\Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize = 2;

        return $this->render('index', [
            'searchModel' => $this->searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new States model.
     * If creation is successful, the browser will be redirected to the 'index' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = $this->findModel();

        $this->saveModel($model);

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $this->saveModel($model);

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing States model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Updates an existing States model.
     * If update is successful, the browser will be redirected to the 'index' page.
     * @param object $model ActiveRecord
     * @return string
     */
    protected function saveModel($model) {
        if ($model->load(\Yii::$app->request->post())) {
            if($model->save()) {
                \Yii::$app->session->setFlash('success', \Yii::t('app', 'Saved success!'));
                return $this->redirect(['index']);
            }
            else
                \Yii::$app->session->setFlash('error', \Yii::t('app', 'Error!'));
        }
        return false;
    }

    abstract protected function findModel($id = null);
}