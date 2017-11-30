<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\NilaiPengolahanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nilai Pengolahan';
$this->params['breadcrumbs'][] = $this->title;
?>
<section>
    <div class="nilai-pengolahan-index">

         <h1><?= Html::encode($this->title) ?></h1>
        <?php
        echo $this->render('_search', ['model' => $searchModel]);

        Pjax::begin();

        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'idmitra0.nik',
                'idmitra0.nama',
                 'idkegiatan0.nama',
                 'idkegiatan0.tahun',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{update}',
                    'buttons' => [
                        'update' => function ($url) {
                            return Html::a(
                                            '<span class="glyphicon glyphicon-edit"></span>', $url, [
                                        'title' => 'Beri nilai',
                                        'data-pjax' => '0',
                                            ]
                            );
                        },
                    ],
                ],
            ],
        ]);

        Pjax::end();
        ?>

    </div>

</section>