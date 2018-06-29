<?php

namespace backend\controllers;

use Yii;
use backend\models\MitraPencacahan;
use backend\models\MitraPencacahanSearch;
use common\models\User;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\UploadedFile;

/**
 * MitraPencacahanController implements the CRUD actions for MitraPencacahan model.
 */
class MitraPencacahanController extends Controller {

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
     * Lists all MitraPencacahan models.
     * @return mixed
     */
    public function actionIndex() {
           $userId = Yii::$app->user->getId();
        $user = User::findIdentity($userId);
        $userProv = $user->getKdprov();
        $userKab = $user->getKdkab();
        if ($userKab == 0) {
            $userKab = \backend\models\Kabupaten::getKabupaten($userProv);
        }
        $dataProvider = new ActiveDataProvider([
            'query' => MitraPencacahan::find()
                    ->where(['kdprov' => (string) $userProv])
                    ->andWhere(['kdkab' => $userKab])
                             ,
        ]);
        return $this->render('index', [
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MitraPencacahan model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new MitraPencacahan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {



        $model = new MitraPencacahan();
        if ($model->load(Yii::$app->request->post())) {
            //get the instance of uploaded file
//            $model->file = UploadedFile::getInstance($model, 'file');
//            $imageLocation = 'uploads/' . $model->nik . "." . $model->file->extension;
//            $model->file->saveAs($imageLocation);
//            //save the path
//            $model->foto = $imageLocation;
            $model->save(false);

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model
            ]);
        }
    }

    /**
     * Updates an existing MitraPencacahan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) { //check if new logo has been browsed or not
            if (UploadedFile::getInstance($model, 'file')) {
                //get the instance of the uploaded file 
                $model->file = UploadedFile::getInstance($model, 'file');
                $imageLocation = 'uploads/' . $model->nik . "." . $model->file->extension;
                $model->file->saveAs($imageLocation);
                //save the path to the DB
                $model->foto = $imageLocation;
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', ['model' => $model,]);
        }
    }

    /**
     * Deletes an existing MitraPencacahan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MitraPencacahan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MitraPencacahan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = MitraPencacahan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findModelBySlug($nik) {
        if (($model = MitraPencacahan::findOne(['nik' => $nik])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException();
        }
    }

    public function actionKabupaten() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $id = end($_POST['depdrop_parents']);
            $list = \backend\models\MitraPencacahan::getKabupaten($id);
            $selected = null;
            if ($id != null && count($list) > 0) {
                $selected = '';
                foreach ($list as $i => $kab) {
                    $out[] = ['id' => $kab['id'], 'name' => $kab['name']];
                }

                // Shows how you can preselect a value
                echo Json::encode(['output' => $out, 'selected' => $selected]);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }

    public function actionKecamatan() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            $id = end($parents);
            $kdprov = $parents[0];
            $list = \backend\models\MitraPencacahan::getKecamatan($kdprov, $id);
            $selected = null;
            if ($id != null && count($list) > 0) {
                foreach ($list as $i => $kec) {
                    $out[] = ['id' => $kec['id'], 'name' => $kec['name']];
                }
                // Shows how you can preselect a value
                echo Json::encode(['output' => $out, 'selected' => $selected]);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }

    public function actionDesa() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            $id = end($parents);
            $kdprov = $parents[0];
            $kdkab = $parents[1];
            $list = \backend\models\MitraPencacahan::getDesa($kdprov, $kdkab, $id);
            $selected = null;
            if ($id != null && count($list) > 0) {
                foreach ($list as $i => $desa) {
                    $out[] = ['id' => $desa['id'], 'name' => $desa['name']];
                }
                // Shows how you can preselect a value
                echo Json::encode(['output' => $out, 'selected' => $selected]);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }

}
