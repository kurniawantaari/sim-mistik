<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MitraPencacahan */

$this->title = 'Update Mitra Pencacahan: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mitra Pencacahan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<section>
<div class="mitra-pencacahan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
    
</section>