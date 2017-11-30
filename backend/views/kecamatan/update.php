<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Kecamatan */

$this->title = 'Update Kecamatan: ' . $model->kdprov;
$this->params['breadcrumbs'][] = ['label' => 'Kecamatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kdprov, 'url' => ['view', 'kdprov' => $model->kdprov, 'kdkab' => $model->kdkab, 'kdkec' => $model->kdkec]];
$this->params['breadcrumbs'][] = 'Update';
?>
<section>

<div class="kecamatan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
    
</section>