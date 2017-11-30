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
        <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

        <?php Pjax::begin(); ?>    <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'idmitra',
                'idkegiatan',
                'waktu_edit',
                'kecepatan_edit',
                'kesalahan_edit',
                'waktu_entri',
                'kecepatan_entri',
                'kesalahan_entri',
                'r_nilai',
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);
        ?>
<?php Pjax::end(); ?></div>

</section>