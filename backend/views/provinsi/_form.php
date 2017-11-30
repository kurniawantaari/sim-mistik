<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Provinsi */
/* @var $form yii\widgets\ActiveForm */
?>
<section>
    <div class="provinsi-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'kdprov')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'nmprov')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</section>