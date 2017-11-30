<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use backend\models\Provinsi;
use kartik\form\ActiveForm;
use kartik\select2\Select2;
use kartik\depdrop\DepDrop;

/* @var $this yii\web\View */
/* @var $model backend\models\Desa */
/* @var $form yii\widgets\ActiveForm */
?>
<section>
    
<div class="desa-form">

    <?php $form = ActiveForm::begin(); ?>

   <?php
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
   ?>

    <?= $form->field($model, 'kddesa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nmdesa')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

</section>