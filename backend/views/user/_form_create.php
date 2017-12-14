<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use backend\models\Satker;
use yii\helpers\ArrayHelper;
use kartik\widgets\SwitchInput;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>
<section>
    <div class="user-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

      <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'nip_baru')->textInput(['maxlength' => true]) ?>

        <?php
                 echo $form->field($model, 'satker')->widget(
                Select2::classname(), [
            'data' => ArrayHelper::map(Satker::find()->asArray()->all(),'satker' ,'satker_pendek')
            ,
            'options' => ['placeholder' => 'Pilih Satker ...',
                'id' => 'satker']
        ]);
           ?>

        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton('Create', ['class' => 'btn btn-success' ]) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</section>