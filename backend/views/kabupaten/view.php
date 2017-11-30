<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Kabupaten */

$this->title = $model->kdprov;
$this->params['breadcrumbs'][] = ['label' => 'Kabupaten', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section>
<div class="kabupaten-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'kdprov' => $model->kdprov, 'kdkab' => $model->kdkab], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'kdprov' => $model->kdprov, 'kdkab' => $model->kdkab], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'kdprov',
            'kdkab',
            'nmkab',
        ],
    ]) ?>

</div>
    
</section>
