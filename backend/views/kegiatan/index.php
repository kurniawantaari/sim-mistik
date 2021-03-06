<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use hscstudio\mimin\components\Mimin;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kegiatan';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="">
    <div class="kegiatan-index">
     

        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Kegiatan Baru', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
        <?php Pjax::begin(); ?>    <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                // 'id',
                'nama',
                'tahun',
                'seksi',
                'tanggal_mulai',
                'tanggal_selesai',
                [
                    'class' => 'yii\grid\ActionColumn',
                    
          'template' => Mimin::filterActionColumn([
             'view', 'update','delete'
          ],$this->context->route),
                  
                    'template' => Mimin::filterActionColumn(['view', 'assignmitrapencacahan', 'assignmitrapengolahan', 'kegiatanselesai', 'kegiatanlanjut', 'update', 'delete' ],$this->context->route),
                    'buttons' => [
                        'assignmitrapencacahan' => function ($url) {
                            return Html::a(
                                            '<span class="glyphicon glyphicon-user"></span>', $url, [
                                        'title' => 'Assign Mitra Pencacahan',
                                        'data-pjax' => '0',
                                            ]
                            );
                        }, 'assignmitrapengolahan' => function ($url) {
                            return Html::a(
                                            '<span class="fa fa-television"></span>', $url, [
                                        'title' => 'Assign Mitra Pengolahan',
                                        'data-pjax' => '0',
                                            ]
                            );
                        }, 'kegiatanselesai' => function ($url) {
                            return Html::a(
                                            '<span class="fa fa-ban"></span>', $url, [
                                        'title' => 'Kegiatan Selesai',
                                        'data-pjax' => '0',
                                            ]
                            );
                        },
                        'kegiatanlanjut' => function ($url) {
                            return Html::a(
                                            '<span class="fa fa-link"></span>', $url, [
                                        'title' => 'Kegiatan Dilanjutkan',
                                        'data-pjax' => '0',
                                            ]
                            );
                        },
                    ],
                ],
            ],
        ]);
        ?>
        <?php Pjax::end(); ?></div>

</section>
