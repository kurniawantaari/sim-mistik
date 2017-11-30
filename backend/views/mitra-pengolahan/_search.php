<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MitraPengolahanSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<section>
<div class="mitra-pengolahan-search">

    <?php
    $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
    ]);
    ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nik') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'nama_panggilan') ?>

    <?= $form->field($model, 'jk') ?>

    <?php // echo $form->field($model, 'alamat') ?>

    <?php // echo $form->field($model, 'kdprov') ?>

    <?php // echo $form->field($model, 'kdkab') ?>

    <?php // echo $form->field($model, 'kdkec') ?>

    <?php // echo $form->field($model, 'kddesa') ?>

    <?php // echo $form->field($model, 'tmptlahir') ?>

    <?php // echo $form->field($model, 'tgllahir') ?>

    <?php // echo $form->field($model, 'kdpendidikan') ?>

    <?php // echo $form->field($model, 'pekerjaan') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'android')->checkbox() ?>

    <?php // echo $form->field($model, 'hp1') ?>

    <?php // echo $form->field($model, 'hp2') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'npwp') ?>

    <?php // echo $form->field($model, 'rekening') ?>

    <?php // echo $form->field($model, 'foto') ?>

    <?php // echo $form->field($model, 'nilai') ?>

    <?php // echo $form->field($model, 'kategori_nilai') ?>

    <?php // echo $form->field($model, 'sedang_survei')->checkbox() ?>
    <?php // echo $form->field($model, 'created_at')  ?>
    <?php // echo $form->field($model, 'updated_at') ?>

        <?php // echo $form->field($model, 'edit_by')  ?>

    <div class="form-group">
<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
    <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
    
</section>