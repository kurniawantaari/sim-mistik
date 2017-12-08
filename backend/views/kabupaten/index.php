<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kabupaten';
$this->params['breadcrumbs'][] = $this->title;
?>
<section>
<div class="kabupaten-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Kabupaten', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([ 'responsive'=>true,
        'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'kdprov',
            'kdkab',
            'nmkab',

            ['class' => 'yii\grid\ActionColumn'],
        ],
   
    ]); ?>
<?php Pjax::end(); ?></div>
    
</section>