<?php

namespace backend\controllers;

use Yii;
use backend\models\NilaiPengolahan;
use backend\models\NilaiPengolahanSearch;
use backend\models\MitraPengolahan;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;use yii\helpers\ArrayHelper;

/**
 * NilaiPengolahanController implements the CRUD actions for NilaiPengolahan model.
 */
class NilaiPengolahanController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
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
     * Lists all NilaiPengolahan models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new NilaiPengolahanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single NilaiPengolahan model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new NilaiPengolahan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new NilaiPengolahan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing NilaiPengolahan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $idmitra = (int) $model->idmitra;
            //hitung rata-rata nilai
            $model->r_nilai = round((
                    $model->kecepatan_edit + $model->kesalahan_edit + $model->kecepatan_entri + $model->kesalahan_entri
                    ) / 4);


            //update nilai total dan kategorinya
            $mitraModel = $this->findMitraModel($idmitra);
            $mitraModel->nilai = (int)
                            NilaiPengolahan::find()->where(['idmitra' => $idmitra])
                            //->where()
                            ->average('r_nilai');

            if ($mitraModel->nilai > 8) {
                $mitraModel->kategori_nilai = "diprioritaskan";
            } else
            if ($mitraModel->nilai >= 6) {
                $mitraModel->kategori_nilai = "dipertimbangkan";
            } else {
                $mitraModel->kategori_nilai = "perlu pembinaan";
            }
            $model->sudah_dinilai = TRUE;
            if ($model->save() && $mitraModel->save()) {
                Yii::$app->getSession()->setFlash('success', [
                    'type' => 'success',
                    'icon' => 'fa fa-info',
                    'message' => 'Berhasil menilai mitra.',
                    'title' => 'Info',
                ]);
                return $this->redirect(['index']);
            } else {
                return $this->render('update', [
                            'model' => $model,
                ]);
            }
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing NilaiPengolahan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the NilaiPengolahan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return NilaiPengolahan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = NilaiPengolahan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findMitraModel($id) {
        if (($model = MitraPengolahan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
