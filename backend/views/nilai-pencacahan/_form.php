<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\form\ActiveField;

/* @var $this yii\web\View */
/* @var $model backend\models\NilaiPencacahan */
/* @var $form yii\widgets\ActiveForm */
?>
<section>
    <div class="nilai-pencacahan-form">

        <?php
        $form = ActiveForm::begin([
                    'id' => 'login-form-horizontal',
                    'type' => ActiveForm::TYPE_HORIZONTAL,
                    'formConfig' => ['labelSpan' => 6, 'deviceSize' => ActiveForm::SIZE_SMALL],
        ]);
        ?>

        <div class="row well">
            <div class="col-md-6">
            <?php
                            echo $form->field($model, 'konsep', [
                    'hintType' => ActiveField::HINT_SPECIAL,
                    'hintSettings' => ['placement' => 'right',
                        'onLabelClick' => true,
                        'onLabelHover' => true,
                        'onIconClick' => true,
                        'onIconHover' => true,
                        'title' => '<i class="glyphicon glyphicon-info-sign"></i> <b>Petunjuk</b>',]
                ])->textInput([
                ])->hint('Nilai penguasaan konsep pada kegiatan yang diikuti.
Rentang nilai dari 0-10.
0 berarti semakin buruk pemahaman konsepnya,
10 berarti semakin baik pemahaman konsepnya.');
                ?>
            </div>
            <div class="col-md-6">
                <?php
                echo $form->field($model, 'isian', [
                    'hintType' => ActiveField::HINT_SPECIAL,
                    'hintSettings' => ['placement' => 'right',
                        'onLabelClick' => true,
                        'onLabelHover' => true,
                        'onIconClick' => true,
                        'onIconHover' => true,
                        'title' => '<i class="glyphicon glyphicon-info-sign"></i> <b>Petunjuk</b>',]
                ])->textInput([
                ])->hint('Nilai penguasaan tatacara isian kuesioner pada kegiatan yang diikuti. Rentang nilai dari 0-10.
0 berarti semakin buruk penguasaan tatacara pengisiannya,
10 berarti semakin baik penguasaan tatacara pengisiannya.');
                ?>
            </div>
            <div class="col-md-6"><?php
                echo $form->field($model, 'tulisan', [
                    'hintType' => ActiveField::HINT_SPECIAL,
                    'hintSettings' => ['placement' => 'right',
                        'onLabelClick' => true,
                        'onLabelHover' => true,
                        'onIconClick' => true,
                        'onIconHover' => true,
                        'title' => '<i class="glyphicon glyphicon-info-sign"></i> <b>Petunjuk</b>',]
                ])->textInput([
                ])->hint('Nilai kejelasan tulisan mitra pada kegiatan yang
diikuti (tulisan dapat dibaca dengan mudah atau tidak).
Rentang nilai dari 0-10. 0 berarti semakin tidak jelas tulisannya,
10 berarti semakin jelas tulisan mitra.');
                ?>
            </div>
            <div class="col-md-6"><?php
                echo $form->field($model, 'waktu', [
                    'hintType' => ActiveField::HINT_SPECIAL,
                    'hintSettings' => ['placement' => 'right',
                        'onLabelClick' => true,
                        'onLabelHover' => true,
                        'onIconClick' => true,
                        'onIconHover' => true,
                        'title' => '<i class="glyphicon glyphicon-info-sign"></i> <b>Petunjuk</b>',]
                ])->textInput([
                ])->hint('Nilai kedisiplinan dari sisi waktu pelaksanaan dan
pengumpulan kuesioner pada kegiatan yang diikuti.
Rentang nilai dari 0-10.
0 berarti semakin kurang disiplin, 10 berarti semakin disiplin.');
                ?>
            </div>
            <div class="col-md-6"><?php
                echo $form->field($model, 'kerjasama', [
                    'hintType' => ActiveField::HINT_SPECIAL,
                    'hintSettings' => ['placement' => 'right',
                        'onLabelClick' => true,
                        'onLabelHover' => true,
                        'onIconClick' => true,
                        'onIconHover' => true,
                        'title' => '<i class="glyphicon glyphicon-info-sign"></i> <b>Petunjuk</b>',]
                ])->textInput([
                ])->hint('Nilai kerjasama mitra dengan KSK atau pengawas pada kegiatan yang diikuti.
                Rentang nilai dari 0-10.
                0 berarti kurang dapat diajak bekerja sama,
                10 berarti semakin mudah diajak bekerja sama.');
                ?>
            </div>
            <div class="col-md-6">
                <?php
                echo $form->field($model, 'koordinasi', [
                    'hintType' => ActiveField::HINT_SPECIAL,
                    'hintSettings' => ['placement' => 'right',
                        'onLabelClick' => true,
                        'onLabelHover' => true,
                        'onIconClick' => true,
                        'onIconHover' => true,
                        'title' => '<i class="glyphicon glyphicon-info-sign"></i> <b>Petunjuk</b>',]
                ])->textInput([
                ])->hint('Nilai koordinasi mitra dengan subject matter atau BPS Kabupaten/Kota.
                Rentang nilai dari 0-10.
                0 berarti koordinasi dengan BPS semakin buruk,
                10 berarti koordinasi dengan BPS semakin baik.');
                ?>
            </div>
        </div>
        <div class="row">
            <?php
            echo $form->field($model, 'sop1', [
                        'hintType' => ActiveField::HINT_SPECIAL,
                        'hintSettings' => ['placement' => 'right',
                            'onLabelClick' => true,
                            'onLabelHover' => true,
                            'onIconClick' => true,
                            'onIconHover' => true,
                            'title' => '<i class="glyphicon glyphicon-info-sign"></i> <b>Petunjuk</b>',]
                    ])->checkbox([
                    ])->label("Kepatuhan Terhadap SOP")
                    ->hint('Contreng pilihan jika melaksanakan kegiatan di berikut ini. Jika mitra adalah pengawas, maka kegiatan yang dimaksud adalah mengawasi pencacahan, penggambaran peta, dst.');
            ?> 

            <?= $form->field($model, 'sop2')->checkbox() ?>

            <?= $form->field($model, 'sop3')->checkbox() ?>

            <?= $form->field($model, 'sop4')->checkbox() ?>

            <?= $form->field($model, 'sop5')->checkbox() ?>
        </div>
        
        <div class="row well">
                
            <div class="col-md-6">
                <?php
                echo $form->field($model, 'persen_error', [
                    'hintType' => ActiveField::HINT_SPECIAL,
                    'hintSettings' => ['placement' => 'right',
                        'onLabelClick' => true,
                        'onLabelHover' => true,
                        'onIconClick' => true,
                        'onIconHover' => true,
                        'title' => '<i class="glyphicon glyphicon-info-sign"></i> <b>Petunjuk</b>',]
                ])->textInput([
                ])->hint('Persentase kesalahan berdasarkan hasil editing dan entri di IPDS');
                ?>
            </div>
            <div class="col-md-6">
                <?php
                echo $form->field($model, 'pascakomputerisasi', [
                    'hintType' => ActiveField::HINT_SPECIAL,
                    'hintSettings' => ['placement' => 'right',
                        'onLabelClick' => true,
                        'onLabelHover' => true,
                        'onIconClick' => true,
                        'onIconHover' => true,
                        'title' => '<i class="glyphicon glyphicon-info-sign"></i> <b>Petunjuk</b>',]
                ])->textInput([
                ])->hint('Nilai pascakomputerisasi berdasarkan persentase kesalahan setelah dilakukan editing dan entry.');
                ?> </div>

        </div>
       

        <div class="form-group">
            <?= Html::submitButton('Beri Nilai', ['class' => 'btn btn-primary btn-lg center-block']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</section>