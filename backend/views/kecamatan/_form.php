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

/* @var $this yii\web\View */
/* @var $model backend\models\Kecamatan */
/* @var $form yii\widgets\ActiveForm */
?>
<section>
    
<div class="kecamatan-form">

    <?php $form = ActiveForm::begin(); ?>

<?php       echo $form->field($model, 'kdprov')->widget(
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

?>

    <?= $form->field($model, 'kdkec')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nmkec')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

</section>