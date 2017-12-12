<?php

use yii\helpers\Html;
?>  
<div class="col-lg-3 col-md-4 text-center">
    <div class="card">
        <div class="icon-block card-content">          
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
    </div>
</div>