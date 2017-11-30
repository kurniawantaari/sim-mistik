<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\NilaiPengolahan */

$this->title = 'Nilai Pengolahan Baru';
$this->params['breadcrumbs'][] = ['label' => 'Nilai Pengolahan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section>
    <div class="nilai-pengolahan-create">

        <h1><?= Html::encode($this->title) ?></h1>

        <?=
        $this->render('_form', [
            'model' => $model,
        ])
        ?>

    </div>
</section>