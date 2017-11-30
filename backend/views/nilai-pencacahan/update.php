<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\NilaiPencacahan */

$this->title = 'Beri Nilai Pencacahan';
$this->params['breadcrumbs'][] = ['label' => 'Nilai Pencacahan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Penilaian';
?>
<section>
    <div class="beri-nilai-pencacahan">

        <h1><?= Html::encode($this->title) ?></h1>
        <h4>Kegiatan: <?=$model->idkegiatan0->nama." ".$model->idkegiatan0->tahun?>
              <h4>Tanggal pelaksanaan: <?=$model->idkegiatan0->tanggal_mulai." s.d. ".$model->idkegiatan0->tanggal_selesai?>
        </h4>
        </h4>
        <h4>Mitra: <?=$model->idmitra0->nik?>-<?=$model->idmitra0->nama?></h4>

        <?=
        $this->render('_form', [
            'model' => $model,
        ])
        ?>

    </div>

</section>