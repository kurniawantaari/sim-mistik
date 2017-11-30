<?php
namespace backend\controllers;

use Yii;
use backend\models\Kecamatan;
use backend\models\KecamatanSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * KecamatanController implements the CRUD actions for Kecamatan model.
 */
class KecamatanController extends Controller
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
     * Lists all Kecamatan models.
     * @return mixed
     */
    public function actionIndex()
    {
//        $dataProvider = new ActiveDataProvider([
//            'query' => Kecamatan::find(),
//        ]);
  $searchModel = new KecamatanSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Kecamatan model.
     * @param string $kdprov
     * @param string $kdkab
     * @param string $kdkec
     * @return mixed
     */
    public function actionView($kdprov, $kdkab, $kdkec)
    {
        return $this->render('view', [
            'model' => $this->findModel($kdprov, $kdkab, $kdkec),
        ]);
    }

    /**
     * Creates a new Kecamatan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Kecamatan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'kdprov' => $model->kdprov, 'kdkab' => $model->kdkab, 'kdkec' => $model->kdkec]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Kecamatan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $kdprov
     * @param string $kdkab
     * @param string $kdkec
     * @return mixed
     */
    public function actionUpdate($kdprov, $kdkab, $kdkec)
    {
        $model = $this->findModel($kdprov, $kdkab, $kdkec);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'kdprov' => $model->kdprov, 'kdkab' => $model->kdkab, 'kdkec' => $model->kdkec]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Kecamatan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $kdprov
     * @param string $kdkab
     * @param string $kdkec
     * @return mixed
     */
    public function actionDelete($kdprov, $kdkab, $kdkec)
    {
        $this->findModel($kdprov, $kdkab, $kdkec)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Kecamatan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $kdprov
     * @param string $kdkab
     * @param string $kdkec
     * @return Kecamatan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($kdprov, $kdkab, $kdkec)
    {
        if (($model = Kecamatan::findOne(['kdprov' => $kdprov, 'kdkab' => $kdkab, 'kdkec' => $kdkec])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
