<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MitraPencacahan */

$this->title = 'Entri Mitra Pencacahan';
$this->params['breadcrumbs'][] = ['label' => 'Mitra Pencacahan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section>
<div class="mitra-pencacahan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
    
</section>