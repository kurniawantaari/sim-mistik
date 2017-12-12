<?php

namespace backend\controllers;

use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\SqlDataProvider;

/**
 * Rekap controller
 */
class RekapController extends Controller {

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

    public function actionRekapNilai() {

        $rekapcacah = new SqlDataProvider([
            'sql' => 'SELECT kategori_nilai, COUNT(id) AS jumlah_mitra ' .
            'FROM mitra_pencacahan ' .
//             'INNER JOIN Articles ON (Authors.ID = Articles.AuthorID) ' .
//             'INNER JOIN ArticleTags ON (Articles.ID = ArticleTags.ID) ' .
            //    'WHERE kategori_nilai><:kategori_nilai' .
            'GROUP BY kategori_nilai',
                //'params' => [':kategori_nilai' => ''],
        ]);

        $rekapolah = new SqlDataProvider([
            'sql' => 'SELECT kategori_nilai, COUNT(id) AS jumlah_mitra ' .
            'FROM mitra_pengolahan ' .
//             'INNER JOIN Articles ON (Authors.ID = Articles.AuthorID) ' .
//             'INNER JOIN ArticleTags ON (Articles.ID = ArticleTags.ID) ' .
            //    'WHERE kategori_nilai><:kategori_nilai' .
            'GROUP BY kategori_nilai',
                //'params' => [':kategori_nilai' => ''],
        ]);

        return $this->render('rekap-nilai', [
                    'dataCacah' => $rekapcacah,
                    'dataOlah' => $rekapolah,
        ]);
    }

    public function actionRekapMitra_kegiatan() {
     
        $queryCacah= 'SELECT kegiatan.nama, kegiatan.tahun, COUNT(nilai_pencacahan.idmitra) AS jumlah_mitra ' .
            'FROM nilai_pencacahan ' .
             'RIGHT JOIN kegiatan ON (kegiatan.id = nilai_pencacahan.idkegiatan) ' .
            'GROUP BY (kegiatan.nama, kegiatan.tahun)';
        $rekapcacah = new SqlDataProvider([
    'sql' => $queryCacah,
    'key'        => 'nama',
    'sort' => [
        'defaultOrder' => ['tahun'=>SORT_DESC],
        'attributes' => [
            'nama',
            'tahun',
            'jumlah_mitra',
            ],
        ], 'pagination' => [
        'pageSize' => 10,
    ],
    ]);

        $queryOlah = 
            'SELECT idkegiatan, kegiatan.nama, kegiatan.tahun, COUNT(nilai_pengolahan.idmitra) AS jumlah_mitra ' .
            'FROM nilai_pengolahan ' .
             'RIGHT JOIN kegiatan ON (kegiatan.id = nilai_pengolahan.idkegiatan) ' .
            'GROUP BY (kegiatan.nama, kegiatan.tahun, idkegiatan)';
        
         $rekapolah = new SqlDataProvider([
    'sql' => $queryOlah,
    'key'        => 'nama',
    'sort' => [
        'defaultOrder' => ['tahun'=>SORT_DESC],
        'attributes' => [
            'nama',
            'tahun',
            'jumlah_mitra',
            ],
        ], 'pagination' => [
        'pageSize' => 10,
    ],
    ]);
        return $this->render('rekap-mitra_kegiatan', [
                    'dataCacah' => $rekapcacah,
                    'dataOlah' => $rekapolah,
        ]);
          }

}
