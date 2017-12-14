<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\widgets\ActiveForm;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<section>
    <div class="user-view">

        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?=
            Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
        </p>

        <?=
        DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'username',
                'nama',
                'nip_baru',
                'satker',
                'email:email',
                [
                    'attribute' => 'status',
                    'format' => 'raw',
                    'options' => [
                        'width' => '80px',
                    ],
                    'value' => function ($data) {
                        if ($data->status == 10)
                            return "<span class='label label-primary'>" . 'Active' . "</span>";
                        else
                            return "<span class='label label-danger'>" . 'Banned' . "</span>";
                    }
                ],
                'created_at:datetime',
                'updated_at:datetime',
            ],
        ])
        ?>

        <?php $form = ActiveForm::begin([]); ?>
        <?php
        echo $form->field($authAssignment, 'item_name')->widget(Select2::classname(), [
            'data' => $authItems,
            'options' => [
                'placeholder' => 'Select role ...',
            ],
            'pluginOptions' => [
                'allowClear' => true,
                'multiple' => true,
            ],
        ])->label('Role');
        ?>

        <div class="form-group">
        <?=
        Html::submitButton('Update', [
            'class' => $authAssignment->isNewRecord ? 'btn btn-success' : 'btn btn-primary',
                //'data-confirm'=>"Apakah anda yakin akan menyimpan data ini?",
        ])
        ?>
        </div>
<?php ActiveForm::end(); ?>
    </div>
</section>