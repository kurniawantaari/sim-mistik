<?php

use yii\helpers\Html;
use kartik\grid\GridView;
//use yii\grid\GridView;
use hscstudio\mimin\components\Mimin;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\NilaiPengolahanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nilai Pengolahan';
$this->params['breadcrumbs'][] = $this->title;
?>
<section>
    <div class="nilai-pengolahan-index">

        <h1><?= Html::encode($this->title) ?></h1>
        <?php
        echo $this->render('_search', ['model' => $searchModel]);

        Pjax::begin();

        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
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
                ],
                  [
          'class' => 'yii\grid\ActionColumn',
          'template' => Mimin::filterActionColumn([
             'view', 'update'
          ],$this->context->route),
                
                ],
//                'buttons' => [
//                    'update' => function ($url) {
//                        return Html::a(
//                                        '<span class="glyphicon glyphicon-edit"></span>', $url, [
//                                    'title' => 'Beri nilai',
//                                    'data-pjax' => '0',
//                                        ]
//                        );
//                    },
//                ],
            ],
        ]);

        Pjax::end();
        ?>

    </div>

</section>