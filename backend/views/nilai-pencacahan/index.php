<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\widgets\Select2;
use kartik\widgets\DepDrop;
use backend\models\Kegiatan;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\NilaiPencacahanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nilai Pencacahan';
$this->params['breadcrumbs'][] = $this->title;
?>
<section>
    <div class="nilai-pencacahan-index">

        <h1><?= Html::encode($this->title) ?></h1>
        <?php
        echo $this->render('_search', ['model' => $searchModel]);

        Pjax::begin();

        echo GridView::widget([
            'dataProvider' => $dataProvider,
         //   'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'idmitra0.nik',
                'idmitra0.nama',
                'idkegiatan0.nama',
                'idkegiatan0.tahun',
                    [
                    'attribute' => 'sudah_dinilai',
                    'format' => 'raw',
                    'options' => [
                        'width' => '80px',
                    ],
                    'value' => function ($data) {
                        if ($data->sudah_dinilai == TRUE)
                            return "<span class='label label-danger'>" . 'Sudah' . "</span>";
                        else
                            return "<span class='label label-success'>" . 'Belum' . "</span>";
                    }
                ],    [
                    'attribute' => 'sudah_dinilai_pengolahan',
                    'format' => 'raw',
                    'options' => [
                        'width' => '80px',
                    ],
                    'value' => function ($data) {
                        if ($data->sudah_dinilai_pengolahan == TRUE)
                            return "<span class='label label-danger'>" . 'Sudah' . "</span>";
                        else
                            return "<span class='label label-success'>" . 'Belum' . "</span>";
                    }
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{nilaipencacahan}   {nilaipengolahan}',
                    'buttons' => ['nilaipencacahan' => function ($url) {
                            return Html::a(
                                            '<span class="fa fa-pencil"></span>', $url, [
                                        'title' => 'Beri Nilai Pencacahan',
                                        'data-pjax' => '0',
                                            ]
                            );
                        },
                        'nilaipengolahan' => function ($url) {
                            return Html::a(
                                            '<span class="fa fa-tv"></span>', $url, [
                                        'title' => 'Beri Nilai Pengolahan',
                                        'data-pjax' => '0',
                                            ]
                            );
                        },
                    ],
                ],
            ],
        ]);

        Pjax::end();
        ?>

    </div>

</section>