<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\NilaiPencacahan */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Nilai Pencacahan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section>
    <div class="nilai-pencacahan-view">

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
                'konsep',
                'isian',
                'tulisan',
                'waktu',
                'kerjasama',
                'koordinasi',
                'sop1:boolean',
                'sop2:boolean',
                'sop3:boolean',
                'sop4:boolean',
                'sop5:boolean',
                'sop',
                'persen_error',
                'pascakomputerisasi',
                'r_nilai',
            ],
        ])
        ?>

    </div>

</section>