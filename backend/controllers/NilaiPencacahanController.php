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
        //$dataProvider->query->where(['sudah_dinilai' => false]);

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

    /**
     * Updates an existing NilaiPencacahan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
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
            //hitung rata-rata nilai
            $model->r_nilai = round((
                    $model->konsep + $model->isian + $model->tulisan + $model->waktu + $model->kerjasama + $model->koordinasi + $model->pascakomputerisasi + $model->sop
                    ) / 8);
            $model->sudah_dinilai = TRUE;
            if ($model->save()) {
                //   update nilai total dan kategorinya
                $mitraModel = $this->findMitraModel($idmitra);
                $mitraModel->nilai = (int)
                                NilaiPencacahan::find()->where(['idmitra'=>$idmitra])
                                ->average('r_nilai');//
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
                    return $this->render('update', [
                                'model' => $model,
                    ]);
                }
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

//             
//                //update nilai total dan kategorinya
//             
//
//             
//              
//                   
//                } else {
//                    return $this->render('update', [
//                                'model' => $model,
//                    ]);
//                }
//            } else {
//                return $this->render('update', [
//                            'model' => $model,
//                ]);
//            }
//        }
//    }

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
