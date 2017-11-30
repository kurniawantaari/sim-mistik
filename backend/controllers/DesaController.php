<?php

namespace backend\controllers;

use Yii;
use backend\models\Desa;
use backend\models\DesaSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DesaController implements the CRUD actions for Desa model.
 */
class DesaController extends Controller
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
     * Lists all Desa models.
     * @return mixed
     */
    public function actionIndex()
    {
//         $searchModel = new NilaiPengolahanSearch();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//                 $dataProvider->query->where(['sudah_dinilai'=>false]);
                 
           $searchModel = new DesaSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//        $dataProvider = new ActiveDataProvider([
//            'query' => Desa::find(),
//        ]);

       return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Desa model.
     * @param string $kdprov
     * @param string $kdkab
     * @param string $kdkec
     * @param string $kddesa
     * @return mixed
     */
    public function actionView($kdprov, $kdkab, $kdkec, $kddesa)
    {
        return $this->render('view', [
            'model' => $this->findModel($kdprov, $kdkab, $kdkec, $kddesa),
        ]);
    }

    /**
     * Creates a new Desa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Desa();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'kdprov' => $model->kdprov, 'kdkab' => $model->kdkab, 'kdkec' => $model->kdkec, 'kddesa' => $model->kddesa]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Desa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $kdprov
     * @param string $kdkab
     * @param string $kdkec
     * @param string $kddesa
     * @return mixed
     */
    public function actionUpdate($kdprov, $kdkab, $kdkec, $kddesa)
    {
        $model = $this->findModel($kdprov, $kdkab, $kdkec, $kddesa);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'kdprov' => $model->kdprov, 'kdkab' => $model->kdkab, 'kdkec' => $model->kdkec, 'kddesa' => $model->kddesa]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Desa model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $kdprov
     * @param string $kdkab
     * @param string $kdkec
     * @param string $kddesa
     * @return mixed
     */
    public function actionDelete($kdprov, $kdkab, $kdkec, $kddesa)
    {
        $this->findModel($kdprov, $kdkab, $kdkec, $kddesa)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Desa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $kdprov
     * @param string $kdkab
     * @param string $kdkec
     * @param string $kddesa
     * @return Desa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($kdprov, $kdkab, $kdkec, $kddesa)
    {
        if (($model = Desa::findOne(['kdprov' => $kdprov, 'kdkab' => $kdkab, 'kdkec' => $kdkec, 'kddesa' => $kddesa])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
