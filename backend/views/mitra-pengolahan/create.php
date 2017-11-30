<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MitraPengolahan */

$this->title = 'Entri Mitra Pengolahan';
$this->params['breadcrumbs'][] = ['label' => 'Mitra Pengolahan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section>
<div class="mitra-pengolahan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
    
</section>