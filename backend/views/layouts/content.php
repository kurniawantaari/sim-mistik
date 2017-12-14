<?php

use yii\widgets\Breadcrumbs;
use dmstr\widgets\Alert;
use yii\helpers\Html;
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

    <?php// echo Alert::widget();
    ?>
<?php foreach (Yii::$app->session->getAllFlashes() as $message):; ?>
            <?php
            echo \kartik\widgets\Growl::widget([
                'type' => (!empty($message['type'])) ? $message['type'] : 'danger',
                'title' => (!empty($message['title'])) ? Html::encode($message['title']) : 'Title Not Set!',
                'icon' => (!empty($message['icon'])) ? $message['icon'] : 'fa fa-info',
                'body' => (!empty($message['message'])) ? Html::encode($message['message']) : 'Message Not Set!',
                'showSeparator' => true,
                'delay' => 1, //This delay is how long before the message shows
                'pluginOptions' => [
                    'delay' => (!empty($message['duration'])) ? $message['duration'] : 3000, //This delay is how long the message shows for
                    'placement' => [
                        'from' => (!empty($message['positonY'])) ? $message['positonY'] : 'bottom',
                        'align' => (!empty($message['positonX'])) ? $message['positonX'] : 'right',
                    ]
                ]
            ]);
            ?>
        <?php endforeach; ?>

              </section>
    <?= $content ?>

</div>

<footer class="main-footer bs-docs-footer">
    <div class="container text-center">
        <div><b>Badan Pusat Statistik Kabupaten Hulu Sungai Utara</b> <br>
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