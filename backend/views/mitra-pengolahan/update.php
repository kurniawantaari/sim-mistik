<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MitraPengolahan */

$this->title = 'Update Mitra Pengolahan: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mitra Pengolahan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<section>
<div class="mitra-pengolahan-update">

    <h1><?= Html::encode($this->title) ?></h1>
 <!--h4>Kegiatan: <?php //echo$model->idkegiatan0->nama." ".$model->idkegiatan0->tahun;?>
        </h4>
        <h4>Mitra: <?php// echo $model->idmitra0->nik;
        //echo $model->idmitra0->nama;?></h4-->
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
    
</section>