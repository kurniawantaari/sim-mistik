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
                
<?php echo $form->field($model, 'status')->widget(SwitchInput::classname(), [
		'pluginOptions' => [
			'onText' => 'Active',
			'offText' => 'Banned',
		]
	]); ?>
        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
<?php if (!$model->isNewRecord) { ?>
		<strong> Leave blank if not change password</strong>
		<div class="ui divider"></div>
		<?= $form->field($model, 'new_password') ?>
		<?= $form->field($model, 'repeat_password') ?>
		<?= $form->field($model, 'old_password') ?>
	<?php } ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</section>