<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Provinsi */

$this->title = 'Update Provinsi: ' . $model->kdprov;
$this->params['breadcrumbs'][] = ['label' => 'Provinsi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kdprov, 'url' => ['view', 'id' => $model->kdprov]];
$this->params['breadcrumbs'][] = 'Update';
?>
<section>
    <div class="provinsi-update">

        <h1><?= Html::encode($this->title) ?></h1>

        <?=
        $this->render('_form', [
            'model' => $model,
        ])
        ?>

    </div>

</section>