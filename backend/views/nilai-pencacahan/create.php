<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\NilaiPencacahan */

$this->title = 'Nilai Pencacahan Baru';
$this->params['breadcrumbs'][] = ['label' => 'Nilai Pencacahan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section>
    <div class="nilai-pencacahan-create">

        <h1><?= Html::encode($this->title) ?></h1>

        <?=
        $this->render('_form', [
            'model' => $model,
        ])
        ?>

    </div>

</section>