<?php

use yii\helpers\Html;
?>  
<div class="text-center">
<br>
    <img src="<?= $model->foto; ?> "/>
    <h3><?= $model->nama_panggilan; ?> </h3>
    <hr>
    <p class="text-white"><?php
        echo Html::a($model->nik, \yii\helpers\Url::to(
                        ['mitra-pencacahan/view', 'id' => $model->id]
        ));
        ?></p>
    <p><?= $model->nama; ?></p>
</div>