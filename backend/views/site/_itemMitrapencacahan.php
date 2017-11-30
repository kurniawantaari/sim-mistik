<?php

use yii\helpers\Html;
?>  
<div class="col-lg-4 col-md-6 text-center">
    <div class="card<?php if ($model->sedang_survei) {
    echo " " . "bgred";
} ?>">
        <div class="icon-block card-content">          
            <img src="<?= $model->foto; ?> "/>
            <h3 class="h3h"><?= $model->nama_panggilan; ?> </h3>

            <p class="text-muted"><?= $model->nik; ?></p>
            <p class="text-muted"><?= $model->nama; ?></p>
<!--            <p class="text-muted"><?= $model->nilai; ?></p>
            <p class="text-muted"><?= $model->kategori_nilai; ?></p>-->
<!--             <p class="text-muted">Pendidikan:<?= $model->kdpendidikan; ?></p>-->
<!--            <p class="text-muted">Pekerjaan<?= $model->pekerjaan; ?></p>-->
<!--             <p class="text-muted">Status:<?= $model->status; ?></p>-->
            <p class="text-muted"><?php if ($model->android == 1) {
    echo "Punya Android";
} else {
    echo "Tidak Punya Android";
} ?></p>
            <p class="text-muted">
                <?php
                if ($model->jk == '2') {
                    echo "Perempuan";
                } else {
                    echo "Laki-laki";
                }
                ?>
            </p>
<!--            <p class="text-muted"><?= $model->alamat; ?></p>-->
            <p class="text-muted"><?php echo $model->tmptlahir . "," . $model->tgllahir; ?></p>
            <p class="text-muted"><?= $model->hp1; ?></p>
            <p class="text-muted right"><?php echo Html::a('more info',
                    \yii\helpers\Url::to(
                            ['mitra-pencacahan/view', 'id' => $model->id]
                            ));
                     ?>
            </p>

        </div>
    </div>
</div>