<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Satker */

$this->title = 'Create Satker';
$this->params['breadcrumbs'][] = ['label' => 'Satkers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section>
    <div class="satker-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

</section>