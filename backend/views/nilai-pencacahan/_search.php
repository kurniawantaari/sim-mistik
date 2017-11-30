<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use backend\models\Kegiatan;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\NilaiPencacahanSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<section>
    <div class="nilai-pencacahan-search">

        <?php
        $form = ActiveForm::begin([
                    'action' => ['index'],
                    'method' => 'get',
        ]);

        echo $form->field($model, 'idkegiatan')->widget(
                Select2::classname(), [
            'data' => ArrayHelper::map(Kegiatan::find()->asArray()->all(), 'id', function($model, $defaultValue) {
                        return $model['nama'] . ' - ' . $model['tahun'];
                    }
            ),
            'options' => ['placeholder' => 'Pilih Kegiatan...'],
            'pluginOptions' => ['allowClear' => true]
        ])->label('Pilih Kegiatan');
        ?>


        <div class="form-group">
            <?= Html::submitButton('Filter', ['class' => 'btn btn-primary']) ?>
            <?php
//echo Html::resetButton('Reset', ['class' => 'btn btn-default']);
            ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</section>