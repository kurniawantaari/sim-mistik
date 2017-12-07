<?php

namespace backend\controllers;

use Yii;
use backend\models\Kegiatan;
use backend\models\NilaiPencacahan;
use backend\models\NilaiPengolahan;
use backend\models\MitraPencacahan;
use backend\models\MitraPengolahan;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\grid\EditableColumnAction;
use yii\helpers\ArrayHelper;

/**
 * KegiatanController implements the CRUD actions for Kegiatan model.
 */
class KegiatanController extends Controller {

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
     * Lists all Kegiatan models.
     * @return mixed
     */
    public function actionIndex() {
        $dataProvider = new ActiveDataProvider([
            'query' => Kegiatan::find(),
        ]);

        return $this->render('index', [
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Kegiatan model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Kegiatan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Kegiatan();

        if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Kegiatan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * View Mitra Pencacahan that Available to be Assigned to Selected Kegiatan
     */
    public function actionAssignmitrapencacahan($id) {
        $dataProvider = new ActiveDataProvider([
            'query' => MitraPencacahan::find()->where(['sedang_survei' => false]),
        ]);
        return $this->render('assignpencacahan', [
                    'dataProvider' => $dataProvider,
                    'idkegiatan' => $id,
        ]);
    }

    /**
     * Assign Mitra Pencacahan for selected Kegiatan.
     * @param integer $id
     * @return mixed
     */
    public function actionAssignpencacahan() {
        $kegiatan = Yii::$app->request->post('kegiatan');
        $selection = (array) Yii::$app->request->post('selection'); //typecasting
        foreach ($selection as $id) {
            $nilai = new NilaiPencacahan();
            $nilai->idkegiatan = (int) $kegiatan;
            $nilai->idmitra = (int) $id;
            $nilai->save(false);
            $mitra = MitraPencacahan::findOne((int) $id); //make a typecasting
            $mitra->sedang_survei = true;
            $mitra->save(false);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => Kegiatan::find(),
        ]);

        \Yii::$app->getSession()->setFlash('success', 'Berhasil menambahkan mitra pencacahan.');
        return $this->render('index', [
                    'dataProvider' => $dataProvider,
        ]);
        
    }

    /**
     * View Mitra Pengolahan that Available to be Assigned to Selected Kegiatan
     */
    public function actionAssignmitrapengolahan($id) {
        $dataProvider = new ActiveDataProvider([
            'query' => MitraPengolahan::find()->where(['sedang_survei' => false]),
        ]);
        return $this->render('assignpengolahan', [
                    'dataProvider' => $dataProvider,
                    'idkegiatan' => $id,
        ]);
    }

    /**
     * Assign Mitra Pencacahan for selected Kegiatan.
     * @param integer $id
     * @return mixed
     */
    public function actionAssignpengolahan() {
        $kegiatan = Yii::$app->request->post('kegiatan');
        $selection = (array) Yii::$app->request->post('selection'); //typecasting
        foreach ($selection as $id) {
            $nilai = new NilaiPengolahan();
            $nilai->idkegiatan = (int) $kegiatan;
            $nilai->idmitra = (int) $id;
            $nilai->save(false);
            $mitra = MitraPengolahan::findOne((int) $id); //make a typecasting
            $mitra->sedang_survei = true;
            $mitra->save(false);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => Kegiatan::find(),
        ]);

        \Yii::$app->getSession()->setFlash('success', 'Berhasil menambahkan mitra pengolahan.');
        return $this->render('index', [
                    'dataProvider' => $dataProvider,
        ]);
    }

    /*     * Menandai bahwa kegiatan telah selesai dan mitra dapat digunakan pada survei lainnya */

    public function actionKegiatanselesai($id) {

        //pilih mitra yang mengikuti kegiatan
        //=pilih idmitra where idkegiatan=$id dari tabel nilai pencacahan 
        //$result=['idmitra=>[4,8]] //example result
        $resultPencacahan = ArrayHelper::toArray(
                        NilaiPencacahan::find()->select('idmitra')->where(['idkegiatan' => (int) $id])->all()
        );
        $resultPengolahan = ArrayHelper::toArray(
                        NilaiPengolahan::find()->select('idmitra')->where(['idkegiatan' => (int) $id])->all()
        );
        // $ids = [4,8];//example result
        $idsPencacahan = ArrayHelper::getColumn($resultPencacahan, 'idmitra');
        $idsPengolahan = ArrayHelper::getColumn($resultPengolahan, 'idmitra');

        /* Update mitra_pencacahan SET sedang_survei = false WHERE id in idmitra_dari tabel nilai pencacahan */
        //jika berhasil tampilkan notif sukses
        MitraPencacahan::updateAll(['sedang_survei' => FALSE], ['in', 'id', $idsPencacahan]);
        MitraPengolahan::updateAll(['sedang_survei' => FALSE], ['in', 'id', $idsPengolahan]);
        \Yii::$app->getSession()->setFlash('success', 'Kegiatan telah diselesaikan.');


        return $this->redirect(['index']);
    }
  public function actionKegiatanlanjut($id) {

        //pilih mitra yang mengikuti kegiatan
        //=pilih idmitra where idkegiatan=$id dari tabel nilai pencacahan 
        //$result=['idmitra=>[4,8]] //example result
        $resultPencacahan = ArrayHelper::toArray(
                        NilaiPencacahan::find()->select('idmitra')->where(['idkegiatan' => (int) $id])->all()
        );
        $resultPengolahan = ArrayHelper::toArray(
                        NilaiPengolahan::find()->select('idmitra')->where(['idkegiatan' => (int) $id])->all()
        );
        // $ids = [4,8];//example result
        $idsPencacahan = ArrayHelper::getColumn($resultPencacahan, 'idmitra');
        $idsPengolahan = ArrayHelper::getColumn($resultPengolahan, 'idmitra');

        /* Update mitra_pencacahan SET sedang_survei = TRUE WHERE id in idmitra_dari tabel nilai pencacahan */
        //jika berhasil tampilkan notif sukses
        MitraPencacahan::updateAll(['sedang_survei' => TRUE], ['in', 'id', $idsPencacahan]);
        MitraPengolahan::updateAll(['sedang_survei' => TRUE], ['in', 'id', $idsPengolahan]);
       
 \Yii::$app->getSession()->setFlash('success', 'Kegiatan telah dilanjutkan kembali.');
 

        return $this->redirect(['index']);
        
    }
    /**
     * Deletes an existing Kegiatan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Kegiatan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Kegiatan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Kegiatan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
