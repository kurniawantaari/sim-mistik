<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MasterPendidikan */

$this->title = 'Create Master Pendidikan';
$this->params['breadcrumbs'][] = ['label' => 'Master Pendidikans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section>
<div class="master-pendidikan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
    
</section>