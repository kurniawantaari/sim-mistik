<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use backend\models\Provinsi;
use kartik\form\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\Kabupaten */
/* @var $form yii\widgets\ActiveForm */
?>
<section>
<div class="kabupaten-form">

    <?php $form = ActiveForm::begin(); ?>

  <?php     echo $form->field($model, 'kdprov')->widget(
                Select2::classname(), [
            'data' => ArrayHelper::map(Provinsi::find()->asArray()->all(), 'kdprov', function($model, $defaultValue) {
                        return $model['kdprov'] . ' - ' . $model['nmprov'];
                    }
            )
            ,
            'options' => ['placeholder' => 'Pilih Provinsi ...',
                'id' => 'mitra-kdprov']
        ]);?>

    <?= $form->field($model, 'kdkab')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nmkab')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
    
</section>