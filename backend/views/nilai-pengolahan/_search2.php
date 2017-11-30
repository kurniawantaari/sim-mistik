<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\NilaiPencacahanSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<section>
    <div class="nilai-pencacahan-search">

        <?php
        $form = ActiveForm::begin([
                    'action' => ['index'],
                    'method' => 'get',
        ]);
        ?>

        <?= $form->field($model, 'id') ?>

        <?= $form->field($model, 'idmitra') ?>

        <?= $form->field($model, 'idkegiatan') ?>

        <?= $form->field($model, 'konsep') ?>

        <?= $form->field($model, 'isian') ?>

        <?php // echo $form->field($model, 'tulisan') ?>

        <?php // echo $form->field($model, 'waktu') ?>

        <?php // echo $form->field($model, 'kerjasama') ?>

        <?php // echo $form->field($model, 'koordinasi') ?>

        <?php // echo $form->field($model, 'sop1')->checkbox() ?>

        <?php // echo $form->field($model, 'sop2')->checkbox() ?>

        <?php // echo $form->field($model, 'sop3')->checkbox() ?>

        <?php // echo $form->field($model, 'sop4')->checkbox() ?>

        <?php // echo $form->field($model, 'sop5')->checkbox() ?>

        <?php // echo $form->field($model, 'sop') ?>

        <?php // echo $form->field($model, 'persen_error') ?>

        <?php // echo $form->field($model, 'pascakomputerisasi') ?>

            <?php // echo $form->field($model, 'r_nilai')  ?>

        <div class="form-group">
<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
        </div>

<?php ActiveForm::end(); ?>

    </div>

</section>