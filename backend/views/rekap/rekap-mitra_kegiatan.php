<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */
$this->title="Rekap Mitra dan Kegiatan";?>
<section>
    <div class="rekap-rekap_mitra_kegiatan">

        <h1><?= Html::encode($this->title) ?></h1>
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h4>Mitra Pencacahan</h4> 
     <?php Pjax::begin(); ?>     <?=
        GridView::widget(['responsive' => true,
            'dataProvider' => $dataCacah,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'nama',
                'tahun',
                'jumlah_mitra',
                
            ],
        ]);
        ?>
                <?php Pjax::end(); ?>
            
            </div>
            <div class="col-sm-12 col-md-6">
                <h4>Mitra Pengolahan</h4> 
          <?php Pjax::begin(); ?>      <?=
        GridView::widget(['responsive' => true,
            'dataProvider' => $dataOlah,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'nama',
                'tahun',
                'jumlah_mitra',
                       
            ],
        ]);
        ?> <?php Pjax::end(); ?></div>
        </div>
      
    </div>

</section>
