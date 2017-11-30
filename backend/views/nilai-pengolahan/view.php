<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\NilaiPengolahan */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Nilai Pengolahan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section>
    <div class="nilai-pengolahan-view">

        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?=
            Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
        </p>

        <?=
        DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'idmitra',
                'idkegiatan',
                'waktu_edit',
                'kecepatan_edit',
                'kesalahan_edit',
                'waktu_entri',
                'kecepatan_entri',
                'kesalahan_entri',
                'r_nilai',
            ],
        ])
        ?>

    </div>

</section>