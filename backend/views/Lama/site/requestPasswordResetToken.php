<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Permintaan perubahan password';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container clearpadding">
    <div class="site-request-password-reset">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>Isikan alamat email Anda. Tautan untuk mengubah password akan dikirimkan email tersebut.</p>

        <div class="row">
            <div class="col-lg-5">
                <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

                <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Kirim', ['class' => 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>

</div>
