<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Kegiatan */

$this->title = 'Assign Mitra Pencacahan';
$this->params['breadcrumbs'][] = ['label' => 'Kegiatan', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Assign Mitra Pencacahan';
?>
<section>
    <div class="kegiatan-assignpencacah">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= Html::beginForm(['kegiatan/assignpencacahan'], 'post'); ?>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            ['class' => '\kartik\grid\CheckboxColumn'],
            'id',
            'nik',
            'nama',
            'jk',
//            'alamat',
//            'kdprov',
//            'kdkab',
//            'kdkec',
//            'kddesa',
//            'tgllahir',
//            'kdpendidikan',
//            'status',
//            'android:boolean',
//            [
//    'attribute' => 'foto',
//    'format' => 'image',
////    'value' => function($data) { return 'you_image.jpeg'; },
//    'contentOptions' => ['class' => 'thumbnail']
//],
],
    ]);
    ?>
    <?php echo Html::hiddenInput('kegiatan', $idkegiatan) ?>

    <?= Html::submitButton('Assign', ['class' => 'btn btn-info']); ?>
    <?= Html::endForm(); ?> 

    <?php $form = ActiveForm::begin(); ?>

    <?php ActiveForm::end(); ?>
</div>
</section>
