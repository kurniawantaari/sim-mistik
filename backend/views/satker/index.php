<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use hscstudio\mimin\components\Mimin;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Satkers';
$this->params['breadcrumbs'][] = $this->title;
?>
<section>
    <div class="satker-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Satker', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([ 'responsive'=>true,
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'satker_pendek',
            'satker',

           [
          'class' => 'yii\grid\ActionColumn',
          'template' => Mimin::filterActionColumn([
             'view', 'update','delete'
          ],$this->context->route),
                  ]
        ],
    ]); ?>
<?php Pjax::end(); ?></div>

</section>