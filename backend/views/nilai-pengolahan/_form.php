<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\form\ActiveField;

/* @var $this yii\web\View */
/* @var $model backend\models\NilaiPengolahan */
/* @var $form kartik\form\ActiveForm 
 */
?>
<section>
    <div class="nilai-pengolahan-form">

        <?php
        $form = ActiveForm::begin([
                    'id' => 'login-form-horizontal',
                    'type' => ActiveForm::TYPE_HORIZONTAL,
                    'formConfig' => ['labelSpan' => 7, 'deviceSize' => ActiveForm::SIZE_SMALL]
        ]);
        ?>

        <div class="row well">
            <div class="col-md-6">

                <?php
                echo $form->field($model, 'kecepatan_edit', [
                    'hintType' => ActiveField::HINT_SPECIAL,
                    'hintSettings' => ['placement' => 'right',
                        'onLabelClick' => true,
                        'onLabelHover' => true,
                        'onIconClick' => true,
                        'onIconHover' => true,
                        'title' => '<i class="glyphicon glyphicon-info-sign"></i> <b>Petunjuk</b>',]
                ])->textInput([
                ])->hint('Nilai kecepatan waktu editing.
                Rentang nilai dari 0-10. 0 berarti semakin lama, 1 0 berarti semakin cepat.');
                ?> 
            </div>
            <div class="col-md-6">

                <?php
                echo $form->field($model, 'waktu_edit', [
                    'hintType' => ActiveField::HINT_SPECIAL,
                    'hintSettings' => ['placement' => 'right',
                        'onLabelClick' => true,
                        'onLabelHover' => true,
                        'onIconClick' => true,
                        'onIconHover' => true,
                        'title' => '<i class="glyphicon glyphicon-info-sign"></i> <b>Petunjuk</b>',]
                ])->textInput([
                ])->hint('Rata-rata waktu yang diperlukan untuk mengedit satu dokumen dalam satuan menit (angka dibulatkan).');
                ?> 

            </div>

        </div>
        <div class="row">
            <div class="col-md-6">
                <?php
                echo $form->field($model, 'kesalahan_edit', [
                    'hintType' => ActiveField::HINT_SPECIAL,
                    'hintSettings' => ['placement' => 'right',
                        'onLabelClick' => true,
                        'onLabelHover' => true,
                        'onIconClick' => true,
                        'onIconHover' => true,
                        'title' => '<i class="glyphicon glyphicon-info-sign"></i> <b>Petunjuk</b>',]
                ])->textInput([
                ])->hint('Nilai kesalahan edit menurut hasil uji petik dokumen.
                Rentang nilai dari 0-10. 0 berarti semakin banyak yang salah edit,
                10 berarti semakin sedikit yang salah edit.');
                ?>  </div> 
        </div>
        <br>

        <div class="row well">

            <div class="col-md-6">
                <?php
                echo $form->field($model, 'kecepatan_entri', [
                    'hintType' => ActiveField::HINT_SPECIAL,
                    'hintSettings' => ['placement' => 'right',
                        'onLabelClick' => true,
                        'onLabelHover' => true,
                        'onIconClick' => true,
                        'onIconHover' => true,
                        'title' => '<i class="glyphicon glyphicon-info-sign"></i> <b>Petunjuk</b>',]
                ])->textInput([
                ])->hint('Nilai kecepatan mengentri dokumen.
                Rentang nilai dari 0-10.
                0 berarti semakin lama, 10 berarti semakin cepat.');
                ?> 
            </div>
            <div class="col-md-6">
                <?php
                echo $form->field($model, 'waktu_entri', [
                    'hintType' => ActiveField::HINT_SPECIAL,
                    'hintSettings' => ['placement' => 'right',
                        'onLabelClick' => true,
                        'onLabelHover' => true,
                        'onIconClick' => true,
                        'onIconHover' => true,
                        'title' => '<i class="glyphicon glyphicon-info-sign"></i> <b>Petunjuk</b>',]
                ])->textInput([
                ])->hint('Rata-rata waktu yang diperlukan untuk mengentri satu dokumen dalam satuan menit.');
                ?> 
            </div>  
        </div>
        <div class="row">
            <div class="col-md-6">
                <?php
                echo $form->field($model, 'kesalahan_entri', [
                    'hintType' => ActiveField::HINT_SPECIAL,
                    'hintSettings' => ['placement' => 'right',
                        'onLabelClick' => true,
                        'onLabelHover' => true,
                        'onIconClick' => true,
                        'onIconHover' => true,
                        'title' => '<i class="glyphicon glyphicon-info-sign"></i> <b>Petunjuk</b>',]
                ])->textInput([
                ])->hint('Nilai kesalahan entri pada suatu kegiatan.
                Rentang nilai dari 0-10. 0 berarti semakin banyak yang salah entri,
                10 berarti semakin sedikit yang salah entri.');
                ?> 
            </div>
        </div>


        <div class="form-group">
            <?= Html::submitButton('Beri Nilai', ['class' => 'btn btn-primary btn-lg center-block']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</section>