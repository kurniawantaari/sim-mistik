<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Desa */

$this->title = 'Update Desa: ' . $model->kdprov;
$this->params['breadcrumbs'][] = ['label' => 'Desa', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kdprov, 'url' => ['view', 'kdprov' => $model->kdprov, 'kdkab' => $model->kdkab, 'kdkec' => $model->kdkec, 'kddesa' => $model->kddesa]];
$this->params['breadcrumbs'][] = 'Update';
?>
<section>
<div class="desa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
    
</section>
