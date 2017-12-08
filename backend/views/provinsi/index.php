<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Provinsi';
$this->params['breadcrumbs'][] = $this->title;
?>
<section>
    <div class="provinsi-index">

        <h1><?= Html::encode($this->title) ?></h1>

        <p>
        <?= Html::a('Create Provinsi', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
        <?php Pjax::begin(); ?>    <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'kdprov',
                'nmprov',
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);
        ?>
<?php Pjax::end(); ?></div>

</section>