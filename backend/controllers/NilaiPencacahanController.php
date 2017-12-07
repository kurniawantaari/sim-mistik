<?php

namespace backend\controllers;

use Yii;
use backend\models\NilaiPencacahan;
use backend\models\NilaiPencacahanSearch;
use backend\models\MitraPencacahan;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * NilaiPencacahanController implements the CRUD actions for NilaiPencacahan model.
 */
class NilaiPencacahanController extends Controller {

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
     * Lists all NilaiPencacahan models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new NilaiPencacahanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        //perlu ditambahkan rule jika pengguna adalah admin, maka muncul full.
        //jika subject matter pencacahan maka sudah dinilainya saja yang false
        //jika subject matter pengolahan maka sudah dinilai pengolahannya saja yang false

        $dataProvider->query->where(['sudah_dinilai' => false])->orWhere(['sudah_dinilai_pengolahan' => false]);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single NilaiPencacahan model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new NilaiPencacahan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new NilaiPencacahan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    public function actionNilaipencacahan($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $idmitra = (int) $model->idmitra;

            //hitung sop
            $count_true = 0;
            if ($model->sop1 == true) {
                $count_true++;
            }
            if ($model->sop2 == true) {
                $count_true++;
            }
            if ($model->sop3 == true) {
                $count_true++;
            }
            if ($model->sop4 == true) {
                $count_true++;
            }
            if ($model->sop5 == true) {
                $count_true++;
            }
            $model->sop = $count_true * 2;

            $model->sudah_dinilai = TRUE;
            $model->save();

            if ($model->sudah_dinilai && $model->sudah_dinilai_pengolahan) {
                //hitung rata-rata nilai
                $model->r_nilai = round((
                        $model->konsep + $model->isian + $model->tulisan + $model->waktu + $model->kerjasama + $model->koordinasi + $model->pascakomputerisasi + $model->sop
                        ) / 8);
                $model->save();
//   update nilai total dan kategorinya
                $mitraModel = $this->findMitraModel($idmitra);
                $mitraModel->nilai = (int)
                                NilaiPencacahan::find()->where(['idmitra' => $idmitra])
                                ->average('r_nilai'); //
                if ($mitraModel->nilai > 8) {
                    $mitraModel->kategori_nilai = "diprioritaskan";
                } else
                if ($mitraModel->nilai >= 6) {
                    $mitraModel->kategori_nilai = "dipertimbangkan";
                } else {
                    $mitraModel->kategori_nilai = "perlu pembinaan";
                }
                if ($mitraModel->save()) {
                    Yii::$app->session->setFlash('success', 'Berhasil menilai mitra.');
                    return $this->redirect(['index']);
                } else {
                    return $this->render('nilaipencacahan', [
                                'model' => $model,
                    ]);
                }
            } else {
                Yii::$app->session->setFlash('success', 'Berhasil menilai mitra.');
                    return $this->redirect(['index']);
            }
        } else {
            return $this->render('nilaipencacahan', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing NilaiPencacahan model.
     * Hanya update apakah sudah dilakukan penilaian pascakomputerisasi
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionNilaipengolahan($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $idmitra = (int) $model->idmitra;

            $model->sudah_dinilai_pengolahan = TRUE;
            $model->save();

            if ($model->sudah_dinilai && $model->sudah_dinilai_pengolahan) {
                //hitung nilai rata-rata  
                $model->r_nilai = round((
                        $model->konsep + $model->isian + $model->tulisan + $model->waktu + $model->kerjasama + $model->koordinasi + $model->pascakomputerisasi + $model->sop
                        ) / 8);
                $model->save();
                //   update nilai total dan kategorinya
                $mitraModel = $this->findMitraModel($idmitra);
                $mitraModel->nilai = (int)
                                NilaiPencacahan::find()->where(['idmitra' => $idmitra])
                                ->average('r_nilai'); //
                if ($mitraModel->nilai > 8) {
                    $mitraModel->kategori_nilai = "diprioritaskan";
                } else
                if ($mitraModel->nilai >= 6) {
                    $mitraModel->kategori_nilai = "dipertimbangkan";
                } else {
                    $mitraModel->kategori_nilai = "perlu pembinaan";
                }
                if ($mitraModel->save()) {
                    Yii::$app->session->setFlash('success', 'Berhasil menilai mitra.');
                    return $this->redirect(['index']);
                } else {
                    return $this->render('nilaipengolahan', [
                                'model' => $model,
                    ]);
                }
            } else {
                Yii::$app->session->setFlash('success', 'Berhasil menilai mitra.');
                    return $this->redirect(['index']);
            }
        } else {
            return $this->render('nilaipengolahan', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing NilaiPencacahan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the NilaiPencacahan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return NilaiPencacahan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = NilaiPencacahan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findMitraModel($id) {
        if (($model = MitraPencacahan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
