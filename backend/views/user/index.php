<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
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
        <?= Html::a('Create User', Url::toRoute('/site/signup'), ['class' => 'btn btn-success']) ?>
        </p>
       
           <?php Pjax::begin(); ?>    <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                //'id',
                'username',
                'nama',
               //  'nip_baru',
              //   'satker',
                // 'auth_key',
               //  'email:email',
                 'status',
                 'created_at:datetime',
                 'updated_at:datetime',
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);
        ?>
<?php Pjax::end(); ?>   
        
      </div>

</section>