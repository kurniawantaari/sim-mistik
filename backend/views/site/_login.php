<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use yii\widget\Pjax;

$this->title = 'Masuk';
$this->params['breadcrumbs'][] = $this->title;
?>
    <?php

Modal::begin([
    'header'=>'<h4>'.Html::encode($this->title).'</h4>',
    'id'=>'#myModal',
    'size'=>'modal-lg',
    ]);?>
 <div class="row" id="modalContent">
            <div class="col-lg-5">
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div style="color:#999;margin:1em 0">
                    Lupa password? <?= Html::a('Atur ulang password sekarang.', ['site/request-password-reset']) ?>.
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Masuk', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
<?php Modal::end()?>