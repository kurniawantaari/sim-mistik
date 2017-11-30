<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Desa */

$this->title = 'Create Desa';
$this->params['breadcrumbs'][] = ['label' => 'Desa', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section>
<div class="desa-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
    
</section>