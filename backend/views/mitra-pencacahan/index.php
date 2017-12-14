<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use hscstudio\mimin\components\Mimin;

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
        <?php Pjax::begin(); ?>    <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                             'nik',
                'nama',
                'nama_panggilan',
                'jk',
                [
                    'attribute' => 'sedang_survei',
                    'format' => 'raw',
                    'options' => [
                        'width' => '80px',
                    ],
                    'label' => 'Sedang Survei?',
                    'value' => function ($data) {
                        if ($data->sedang_survei == TRUE)
                            return "<span class='label label-danger'>" . 'Ya' . "</span>";
                        else
                            return "<span class='label label-success'>" . 'Tidak' . "</span>";
                    }
                ],
                [
                    'attribute' => 'kategori_nilai',
                    'format' => 'raw',
                    'options' => [
                        'width' => '80px',
                    ],
                    'label' => 'Rekomendasi',
                    'value' => function ($data) {
                        if ($data->kategori_nilai == 'diprioritaskan') {
                            return "<span class='label label-success'>" . 'Diprioritaskan' . "</span>";
                        } else if ($data->kategori_nilai == 'dipertimbangkan') {
                            return "<span class='label label-warning'>" . 'Dipertimbangkan' . "</span>";
                             } else if ($data->kategori_nilai == 'perlu pembinaan') {
                            return "<span class='label label-danger'>" . 'Perlu Pembinaan' . "</span>";
                        } else {
                            return "<span class='label label-default'>" . 'Not Available' . "</span>";
                        }
                    }
                ],
                [
          'class' => 'yii\grid\ActionColumn',
          'template' => Mimin::filterActionColumn([
             'view', 'update','delete'
          ],$this->context->route),
                  ]
            ],
        ]);
        ?>
        <?php Pjax::end(); ?></div>

</section>