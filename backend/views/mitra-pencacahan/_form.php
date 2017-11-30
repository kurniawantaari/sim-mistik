<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use backend\models\Provinsi;
use backend\models\MasterPendidikan;
use kartik\form\ActiveForm;
use kartik\file\FileInput;
use kartik\select2\Select2;
use kartik\depdrop\DepDrop;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\MitraPencacahan */
/* @var $form yii\widgets\ActiveForm */
?>
<section>
    <div class="mitra-pencacahan-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
  
    <div class="col-md-6">
    <?= $form->field($model, 'nik')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'nama_panggilan')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'alamat')->textarea(['maxlength' => true]) ?>
        <?php
        // Memilih Provinsi. Default: Kalsel
        if ($model->isNewRecord && !isset($model->kdprov)) {
            $model->kdprov = '63'; // the id for 'provinsi'; 
        }
        if ($model->isNewRecord && !isset($model->kdkab)) {
            if ($model->kdprov == '63') {
                $model->kdkab = '08'; // the id for 'kabupaten'; 
            }
        }

        echo $form->field($model, 'kdprov')->widget(
                Select2::classname(), [
            'data' => ArrayHelper::map(Provinsi::find()->asArray()->all(), 'kdprov', function($model, $defaultValue) {
                        return $model['kdprov'] . ' - ' . $model['nmprov'];
                    }
            )
            ,
            'options' => ['placeholder' => 'Pilih Provinsi ...',
                'id' => 'mitra-kdprov']
        ]);

        // Memilih Kabupaten, default: HSU
        echo $form->field($model, 'kdkab')->widget(DepDrop::classname(), [
            'options' => ['placeholder' => 'Pilih Kabupaten ...',
                'id' => 'mitra-kdkab'],
            'data' => [$model->kdkab => 'default'],
            'type' => DepDrop::TYPE_SELECT2,
            'select2Options' => ['pluginOptions' => ['allowClear' => true]],
            'pluginOptions' => [
                'depends' => ['mitra-kdprov'],
                'initialize' => true,
                'initDepends' => ['mitra-kdprov'],
                'url' => Url::to(['/mitra-pencacahan/kabupaten']),
                'loadingText' => 'Memuat daftar kabupaten ...',
            ]
        ]);

// Memilih Kecamatan
        echo $form->field($model, 'kdkec')->widget(DepDrop::classname(), [
            'options' => ['placeholder' => 'Pilih Kecamatan ...',
                'id' => 'mitra-kdkec'],
            'data' => [$model->kdkec => 'default'],
            'type' => DepDrop::TYPE_SELECT2,
            'select2Options' => ['pluginOptions' => ['allowClear' => true]],
            'pluginOptions' => [
                'depends' => ['mitra-kdprov', 'mitra-kdkab'],
//                'initialize' => true,
//                'initDepends' => ['mitra-kdprov', 'mitra-kdkab'],
                'url' => Url::to(['/mitra-pencacahan/kecamatan']),
                'loadingText' => 'Memuat daftar kecamatan ...',
            ]
        ]);

// Memilih Desa
        echo $form->field($model, 'kddesa')->widget(DepDrop::classname(), [
            'options' => ['placeholder' => 'Pilih Desa ...'],
            'type' => DepDrop::TYPE_SELECT2,
            'data' => [$model->kddesa => 'default'],
            'select2Options' => ['pluginOptions' => ['allowClear' => true]],
            'pluginOptions' => [
                'depends' => ['mitra-kdprov', 'mitra-kdkab', 'mitra-kdkec'],
//                'initialize' => true,
//                 'initDepends' => ['mitra-kdprov', 'mitra-kdkab', 'mitra-kdkec'],
                'url' => Url::to(['/mitra-pencacahan/desa']),
                'loadingText' => 'Memuat daftar desa ...'
            ]
        ]);
        echo $form->field($model, 'jk')->radioList([
            1 => 'Laki-laki',
            2 => 'Perempuan'], ['inline' => true]);
        ?>
               <?= $form->field($model, 'tmptlahir')->textInput(['maxlength' => true]); ?>
            <?php
            echo $form->field($model, 'tgllahir')->widget(DatePicker::classname(), [
                'type' => DatePicker::TYPE_COMPONENT_APPEND,
                'options' => ['placeholder' => 'Masukkan tanggal lahir ...'],
                'removeButton' => false,
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd',
                    'autoclose' => true
                ]
            ]);
            ?>

    </div>
    <div class="col-md-6">
        <?php
        echo $form->field($model, 'kdpendidikan')->radioList(
                ArrayHelper::map(MasterPendidikan::find()->asArray()->all(), 'kdpendidikan', 'jenjang'));
        echo $form->field($model, 'pekerjaan')->textInput(['maxlength' => true]);
        echo $form->field($model, 'status')->radioList(
                [
            1 => 'Belum kawin',
            2 => 'Pernah kawin'
                ], ['inline' => true]);
        ?>
        <?php
        echo $form->field($model, 'android')->radioList([
            0 => 'Tidak punya',
            1 => 'Punya'
                ], ['inline' => true]);
        ?>

        <?= $form->field($model, 'hp1')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'hp2')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'rekening')->textInput(['maxlength' => true])->hint('Bank - Nomor Rekening') ?>


        <?= $form->field($model, 'email')->input('email') ?>

        <?= $form->field($model, 'npwp')->textInput(['maxlength' => true]) ?>
        <?php
        echo $form->field($model, 'file')->widget(FileInput::classname(), [
            'options' => ['accept' => 'image/*'],
            'pluginOptions' => [
                'showCaption' => true,
                'showRemove' => false,
                'showUpload' => false
            ]
        ]);
        ?>
    </div>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Tambah Mitra' : 'Update Mitra', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
</section>