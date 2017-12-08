<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Biodata Mitra Pencacahan';
$this->params['breadcrumbs'][] = $this->title;
?>
<section>
    <div class="mitra-pencacahan-biodata">

        <h1><?= Html::encode($this->title) ?></h1>

        <?php Pjax::begin(); 
        
      //   echo $this->render('_search', ['searchModel' => $searchModel]);?> 
        <div class="row">

            <?php
            echo ListView::widget([
                'dataProvider' => $dataProvider,
                 //  'searchModel' => $searchModel,
                'itemView' => '_itemMitrapencacahan',
            ]);
            ?>
            <?php Pjax::end(); ?></div>

    </div>
</section>