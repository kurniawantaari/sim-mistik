<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MitraPengolahan */

$this->title = $model->nik;
$this->params['breadcrumbs'][] = ['label' => 'Mitra Pengolahan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section>
<div class="mitra-pengolahan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nik',
            'nama',
            'nama_panggilan',
            'jk',
            'alamat',
            'kdprov',
            'kdkab',
            'kdkec',
            'kddesa',
            'tmptlahir',
            'tgllahir',
            'kdpendidikan',
            'pekerjaan',
            'status',
            'android:boolean',
            'hp1',
            'hp2',
            'email:email',
            'npwp',
            'rekening',
            'foto:image',
            'sedang_survei:boolean',
            
        ],
    ]) ?>

</div>
    
</section>