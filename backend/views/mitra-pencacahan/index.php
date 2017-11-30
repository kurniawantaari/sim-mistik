<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mitra Pencacahan';
$this->params['breadcrumbs'][] = $this->title;
?>
<section>
<div class="mitra-pencacahan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Entri Mitra Pencacahan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nik',
            'nama',
            'nama_panggilan',
            'jk',
            // 'alamat',
            // 'kdprov',
            // 'kdkab',
            // 'kdkec',
            // 'kddesa',
            // 'tmptlahir',
            // 'tgllahir',
            // 'kdpendidikan',
            // 'pekerjaan',
            // 'status',
            // 'android:boolean',
            // 'hp1',
            // 'hp2',
            // 'email:email',
            // 'npwp',
            // 'rekening',
            // 'foto',
            // 'nilai',
            // 'kategori_nilai',
            // 'sedang_survei:boolean',
            //  'created_at',
            //  'updated_at',
            // 'edit_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
    
</section>