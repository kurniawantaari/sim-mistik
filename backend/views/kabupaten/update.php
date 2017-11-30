<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Kabupaten */

$this->title = 'Update Kabupaten: ' . $model->kdprov;
$this->params['breadcrumbs'][] = ['label' => 'Kabupaten', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kdprov, 'url' => ['view', 'kdprov' => $model->kdprov, 'kdkab' => $model->kdkab]];
$this->params['breadcrumbs'][] = 'Update';
?>
<section>
<div class="kabupaten-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
    
</section>