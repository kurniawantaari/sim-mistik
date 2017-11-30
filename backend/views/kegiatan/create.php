<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Kegiatan */

$this->title = 'Kegiatan Baru';
$this->params['breadcrumbs'][] = ['label' => 'Kegiatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section>
<div class="kegiatan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
    
</section>
