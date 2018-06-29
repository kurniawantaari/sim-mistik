<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use backend\models\Satker;
use yii\helpers\ArrayHelper;
use kartik\widgets\SwitchInput;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
use backend\models\Provinsi;

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
     
        // Memilih Provinsi. Default: Kalsel
        if ($model->isNewRecord && !isset($model->prov)) {
            $model->prov = '63'; // the id for 'provinsi'; 
        }
        

echo $form->field($model, 'prov')->widget(
                Select2::classname(), [
            'data' => ArrayHelper::map(Provinsi::find()->asArray()->all(), 'kdprov', function($model, $defaultValue) {
                        return $model['kdprov'] . ' - ' . $model['nmprov'];
                    }
            )
            ,
            'options' => ['placeholder' => 'Pilih Provinsi ...',
                'id' => 'kdprov']
        ]);
            
        // Memilih Kabupaten
        echo $form->field($model, 'kab')->widget(DepDrop::classname(), [
            'options' => ['placeholder' => 'Pilih Kabupaten ...',
                'id' => 'mitra-kdkab'],
          //  'data' => [$model->kab => 'default'],
            'type' => DepDrop::TYPE_SELECT2,
       //     'select2Options' => ['pluginOptions' => ['allowClear' => true]],
            'pluginOptions' => [
                'depends' => ['kdprov'],
                'initialize' => true,
                'initDepends' => ['kdprov'],
                'url' => Url::toRoute(['user/kabupaten']),
                //'loadingText' => 'Memuat daftar kabupaten ...',
            ]
        ]);
        ?>
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