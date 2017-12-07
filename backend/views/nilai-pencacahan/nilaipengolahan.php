<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\form\ActiveField;

/* @var $this yii\web\View */
/* @var $model backend\models\NilaiPencacahan */

$this->title = 'Beri Nilai Pencacahan-Pengolahan';
$this->params['breadcrumbs'][] = ['label' => 'Nilai Pencacahan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Penilaian';
?>
<section>
    <div class="beri-nilai-pencacahan">

        <h1><?= Html::encode($this->title) ?></h1>
        <h4>Kegiatan: <?= $model->idkegiatan0->nama . " " . $model->idkegiatan0->tahun ?>
            <h4>Tanggal pelaksanaan: <?= $model->idkegiatan0->tanggal_mulai . " s.d. " . $model->idkegiatan0->tanggal_selesai ?>
            </h4>
        </h4>
        <h4>Mitra: <?= $model->idmitra0->nik ?>-<?= $model->idmitra0->nama ?></h4>
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
    </div>

</section>