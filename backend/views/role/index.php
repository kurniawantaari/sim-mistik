<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use hscstudio\mimin\components\Mimin;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\administrator\models\AuthItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Roles';
$this->params['breadcrumbs'][] = $this->title;
?>
<section>
<div class="auth-item-index">

	<h1><?= Html::encode($this->title) ?></h1>
	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<p>
		<?= Html::a('Create Role', ['create'], ['class' => 'btn btn-success']) ?>
	</p>

	<?= GridView::widget([ 'responsive'=>true,
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],

			'name',
			/*
			'type',
			'description:ntext',
			'rule_name',
			'data:ntext',
			// 'created_at',
			// 'updated_at',
			*/
			 [
          'class' => 'yii\grid\ActionColumn',
          'template' => Mimin::filterActionColumn([
             'view', 'update','delete'
          ],$this->context->route),
                  ],
	]]) ?>

</div>
    
</section>
