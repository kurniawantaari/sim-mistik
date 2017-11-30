<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use frontend\models\Satker;

$this->title = 'Daftar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container clearpadding">
    <div class="site-signup">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>Isi formulir berikut untuk mendaftar:</p>

        <div class="row">
            <div class="col-lg-5">
                <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                <?= $form->field($model, 'nip_baru')->textInput(['autofocus' => true, 'maxlength' => true,'placeholder'=>'Contoh: 199012302017012001']) ?>

                <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

                <?php
                 echo $form->field($model, 'satker')->widget(
                Select2::classname(), [
            'data' => ArrayHelper::map(Satker::find()->asArray()->all(),'satker' ,'satker_pendek')
            ,
            'options' => ['placeholder' => 'Pilih Satker ...',
                'id' => 'satker']
        ]);
           ?>
                

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Daftar', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>

</div>
