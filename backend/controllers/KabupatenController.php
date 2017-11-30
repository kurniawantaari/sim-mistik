<?php

namespace backend\controllers;

use Yii;
use backend\models\Kabupaten;
use backend\models\KabupatenSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * KabupatenController implements the CRUD actions for Kabupaten model.
 */
class KabupatenController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Kabupaten models.
     * @return mixed
     */
    public function actionIndex()
    {
//        $dataProvider = new ActiveDataProvider([
//            'query' => Kabupaten::find(),
//        ]);

          $searchModel = new KabupatenSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            
      return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Kabupaten model.
     * @param string $kdprov
     * @param string $kdkab
     * @return mixed
     */
    public function actionView($kdprov, $kdkab)
    {
        return $this->render('view', [
            'model' => $this->findModel($kdprov, $kdkab),
        ]);
    }

    /**
     * Creates a new Kabupaten model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Kabupaten();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'kdprov' => $model->kdprov, 'kdkab' => $model->kdkab]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Kabupaten model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $kdprov
     * @param string $kdkab
     * @return mixed
     */
    public function actionUpdate($kdprov, $kdkab)
    {
        $model = $this->findModel($kdprov, $kdkab);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'kdprov' => $model->kdprov, 'kdkab' => $model->kdkab]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Kabupaten model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $kdprov
     * @param string $kdkab
     * @return mixed
     */
    public function actionDelete($kdprov, $kdkab)
    {
        $this->findModel($kdprov, $kdkab)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Kabupaten model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $kdprov
     * @param string $kdkab
     * @return Kabupaten the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($kdprov, $kdkab)
    {
        if (($model = Kabupaten::findOne(['kdprov' => $kdprov, 'kdkab' => $kdkab])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
