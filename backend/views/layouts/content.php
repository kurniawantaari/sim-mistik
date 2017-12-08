<?php

use yii\widgets\Breadcrumbs;
use dmstr\widgets\Alert;
?>
<div class="content-wrapper">
    <section class="content-header">
        <?php // if (isset($this->blocks['content-header'])) { ?>
            <!--<h1><?php // echo $this->blocks['content-header']; ?></h1>-->
        <?php // } else { ?>
<!--            <h1>
                <?php
//                if ($this->title !== null) {
//                    echo \yii\helpers\Html::encode($this->title);
//                } else {
//                    echo \yii\helpers\Inflector::camel2words(
//                            \yii\helpers\Inflector::id2camel($this->context->module->id)
//                    );
//                    echo ($this->context->module->id !== \Yii::$app->id) ? '<small>Module</small>' : '';
//                }
                ?>
            </h1>-->
        <?php // } ?>
  
    <?php
    echo
    Breadcrumbs::widget([
        'homeLink' => [
            'label' => 'Beranda',
            'template' => "<li><b>You're here:</b></li><li id='no-mark'>{link}</li>",
            'url' => Yii::$app->homeUrl,
        ],
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]);
    ?>

    <?= Alert::widget() ?>
              </section>
    <?= $content ?>

</div>

<footer class="main-footer bs-docs-footer">
    <div class="container text-center">
        <div>Badan Pusat Statistik Kabupaten Hulu Sungai Utara <br>
            Jln. H. Saberan Effendi RT 03, Kel. Sungai Malang, Amuntai, 71418<br>
            Telp/Fax. (0527) 61049</div> 
        <div>Hubungi Kami:</div>
        <div>
            <ul class="bs-docs-footer-links"> 

                <li>
                    <a class="white-text sosial" href="http://fb.com/BPSHSU6308" style="color:green">
                        <i class="fa fa-2x fa-facebook-official"></i>
                    </a>
                </li>
                <li>
                    <a class="white-text sosial" href="mailto:bps6308@bps.go.id" style="color:green">
                        <i class="fa fa-2x fa-envelope"></i>
                    </a>
                </li>
                <li>
                    <a class="white-text sosial" href="http://hulusungaiutarakab.bps.go.id" style="color:green">
                        <i class="fa fa-2x fa-globe"></i>
                    </a>
                </li>
            </ul> 

        </div>

    </div>
</footer>