<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Desa */

$this->title = $model->kdprov;
$this->params['breadcrumbs'][] = ['label' => 'Desa', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section>
    
<div class="desa-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'kdprov' => $model->kdprov, 'kdkab' => $model->kdkab, 'kdkec' => $model->kdkec, 'kddesa' => $model->kddesa], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'kdprov' => $model->kdprov, 'kdkab' => $model->kdkab, 'kdkec' => $model->kdkec, 'kddesa' => $model->kddesa], [
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
            'kddesa',
            'nmdesa',
        ],
    ]) ?>

</div>

</section>