<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rekomendasi Mitra Pengolahan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container clearpadding">
    <div class="mitra-pencacahan-rekomendasi">

        <h1><?= Html::encode($this->title) ?></h1>

        <?php Pjax::begin(); 
        
         echo $this->render('_search', ['model' => $searchModel]);?> 
        
        <div class="row">

            <?php
            echo ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '_itemMitra',
            ]);
            ?>
            <?php Pjax::end(); ?></div>

    </div>
</div>
