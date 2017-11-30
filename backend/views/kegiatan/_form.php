<?php

use kartik\date\DatePicker;
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use backend\models\Satker;

/* @var $this yii\web\View */
/* @var $model backend\models\Kegiatan */
/* @var $form yii\widgets\ActiveForm */
?>
<section>
    <div class="kegiatan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tahun')->textInput(['maxlength' => true]) ?>

   <?php
                 echo $form->field($model, 'seksi')->widget(
                Select2::classname(), [
            'data' => ArrayHelper::map(Satker::find()->asArray()->all(),'satker' ,'satker_pendek')
            ,
            'options' => ['placeholder' => 'Pilih Satker ...',
                'id' => 'seksi']
        ]);
           ?>
                
    
 <?php
    echo '<label class="control-label">Jadwal Pelaksanaan Pencacahan</label>';
echo DatePicker::widget([
    'model' => $model,
    'attribute' => 'tanggal_mulai',
    'attribute2' => 'tanggal_selesai',
    'options' => ['placeholder' => 'Tanggal Mulai'],
    'options2' => ['placeholder' => 'Tanggal Selesai'],
    'type' => DatePicker::TYPE_RANGE,
    'form' => $form,
    'pluginOptions' => [
        'format' => 'yyyy-mm-dd',
        'autoclose' => false,
    ]
]);
?>       <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Baru' : 'Perbarui', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

</section>
