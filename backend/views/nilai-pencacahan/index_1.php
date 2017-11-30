<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\NilaiPencacahanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nilai Pencacahan';
$this->params['breadcrumbs'][] = $this->title;
?>
<section>
    <div class="nilai-pencacahan-index">

        <h1><?= Html::encode($this->title) ?></h1>
        <?php //echo $this->render('_search', ['model' => $searchModel]);  ?>

        <?php Pjax::begin(); ?>    <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'idmitra',
                'idkegiatan',
                'konsep',
                'isian',
                // 'tulisan',
                // 'waktu',
                // 'kerjasama',
                // 'koordinasi',
                // 'sop1:boolean',
                // 'sop2:boolean',
                // 'sop3:boolean',
                // 'sop4:boolean',
                // 'sop5:boolean',
                // 'sop',
                // 'persen_error',
                // 'pascakomputerisasi',
                // 'r_nilai',
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);
        ?>
<?php Pjax::end(); ?></div>
</section>