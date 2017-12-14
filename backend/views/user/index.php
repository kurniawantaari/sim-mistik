<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use hscstudio\mimin\components\Mimin;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<section>
    <div class="user-index">

        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?php Pjax::begin(); ?>    <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                //'id',
                'username',
                'nama',
                //  'nip_baru',
                //   'satker',
                // 'auth_key',
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
                [
                    'attribute' => 'created_at',
                    'format' => ['date', 'php:d M Y H:i:s'],
                    'options' => [
                        'width' => '120px',
                    ],
                ],
                [
                    'attribute' => 'updated_at',
                    'format' => ['date', 'php:d M Y H:i:s'],
                    'options' => [
                        'width' => '120px',
                    ],
                ],
                [
                    'attribute' => 'roles',
                    'format' => 'raw',
                    'value' => function ($data) {
                        $roles = [];
                        foreach ($data->roles as $role) {
                            $roles[] = $role->item_name;
                        }
                        return Html::a(implode(', ', $roles), ['view', 'id' => $data->id]);
                    }
                ], [
          'class' => 'yii\grid\ActionColumn',
          'template' => Mimin::filterActionColumn([
             'view', 'update','delete'
          ],$this->context->route),
                  ]
            ],
        ]);
        ?>
        <?php Pjax::end(); ?>   

    </div>

</section>