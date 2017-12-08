<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\MitraPengolahanSearch;
use backend\models\MitraPencacahanSearch;

/**
 * Mitra controller
 */
class MitraController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                //'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['login'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        // 'actions' => ['index','logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    public function actionBiodataPengolahan() {
        //join model pengolahan dan nilai dan kegiatan
        $searchModel = new MitraPengolahanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('biodataPengolahan', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionBiodataPencacahan() {
        //join model pengolahan dan nilai dan kegiatan
        $searchModel = new MitraPencacahanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('biodataPencacahan', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionRekomendasiPengolahan() {
        //join model pengolahan dan nilai dan kegiatan
        //kayaknya pakai model baru aja. diambil dari model mitra terus join dulu.

        $searchModel = new MitraPengolahanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where('nilai >= 6');
        $dataProvider->query->andWhere(['sedang_survei' => false]);

        return $this->render('rekomendasiPengolahan', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionRekomendasiPencacahan() {
        //join model pengolahan dan nilai dan kegiatan
        //kayaknya pakai model baru aja. diambil dari model mitra terus join dulu.
        //agar bisa filter berdasarkan daerah dan kegiatan apa
        $searchModel = new MitraPencacahanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where('nilai >= 6');
        $dataProvider->query->andWhere(['sedang_survei' => false]);

        return $this->render('rekomendasiPencacahan', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

}
