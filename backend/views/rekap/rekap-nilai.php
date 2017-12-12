<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */
$this->title="Rekap Nilai Mitra";?>
<section>
    <div class="rekap-rekap_nilai">

        <h1><?= Html::encode($this->title) ?></h1>
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h4>Mitra Pencacahan</h4> 
         <?=
        GridView::widget(['responsive' => true,
            'dataProvider' => $dataCacah,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'kategori_nilai',
                'jumlah_mitra',
                
                        
            ],
        ]);
        ?>      </div>
            <div class="col-sm-12 col-md-6">
                <h4>Mitra Pengolahan</h4> 
           <?=
        GridView::widget(['responsive' => true,
            'dataProvider' => $dataOlah,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'kategori_nilai',
                'jumlah_mitra',
                       
            ],
        ]);
        ?> </div>
        </div>
      
    </div>

</section>
