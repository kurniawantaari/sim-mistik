<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Kecamatan */

$this->title = $model->kdprov;
$this->params['breadcrumbs'][] = ['label' => 'Kecamatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section>
<div class="kecamatan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'kdprov' => $model->kdprov, 'kdkab' => $model->kdkab, 'kdkec' => $model->kdkec], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'kdprov' => $model->kdprov, 'kdkab' => $model->kdkab, 'kdkec' => $model->kdkec], [
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
            'kdkec',
            'nmkec',
        ],
    ]) ?>

</div>
    
</section>