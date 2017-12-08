<?php

use yii\helpers\Html;
?>  
<div class="col-lg-3 col-md-4 text-center">
    <div class="card<?php if ($model->sedang_survei) {
    echo " " . "bgrey";
} else
                if ($model->kategori_nilai == 'diprioritaskan') {
                    echo " " . "bglightgreen" ;
                } else if($model->kategori_nilai == 'dipertimbangkan'){
                      echo " " . "bglightyellow" ;
                } else{  echo " " . "bglightred" ;}
                
?>">
         <div class="icon-block card-content">          
            <img src="<?= $model->foto; ?> "/>
            <h3><?= $model->nama_panggilan; ?> </h3>
 <hr>
            <p class="text-white"><?php echo Html::a($model->nik,
                    \yii\helpers\Url::to(
                            ['mitra-pengolahan/view', 'id' => $model->id]
                            ));
                     ?></p>
             <p><?= $model->nama; ?></p>
             <p><?= $model->hp1; ?></p>
               <!--<p><?php // echo $model->alamat; ?></p>-->
            <!--<p><?php // echo $model->kdpendidikan0->jenjang; ?></p>-->
            <!--<p>Pekerjaan:<?php // echo $model->pekerjaan; ?></p>-->
<!--             <p>Status:<?php
//if ($model->status == 1) {
//    echo "Belum kawin";
//} else {
//    echo "Pernah kawin";
//}
            ?></p>-->   
            <p><?php
                if ($model->android == 1) {
                    echo "Punya Android";
                } else {
                    echo "Tidak Punya Android";
                }
                ?></p>
<!--            <p>
                <?php
//                if ($model->jk == '2') {
//                    echo "Perempuan";
//                } else {
//                    echo "Laki-laki";
//                }
                ?>
            </p>-->
                      <!--<p><?php // echo $model->tmptlahir . "," . $model->tgllahir; ?></p>-->
           
                   </div>
    </div>
</div>