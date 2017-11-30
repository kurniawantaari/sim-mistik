<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <div class="wrap">
            <?php
            NavBar::begin([
                'brandLabel' => 'SIM-MISTIK',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                //    'class' => 'navbar navbar-expand-lg navbar-fixed-top',
                // 'id'=> 'mainNav',
                ],
            ]);

            $menuItems = [
                ['label' => '<span class="glyphicon glyphicon-home"></span>',
                    'url' => ['/site/index'],
                    'class' => 'nav-item'
                ],
            ];

            if (Yii::$app->user->isGuest) {
              $menuItems[] = ['label' => 'Masuk','options'=>['id'=>'modalLogin'], 'url' => ['/site/login']];
            } else {
                $menuItems[] = ['label' => 'Biodata',
                    'items' => [
                        ['label' => 'Mitra Pencacahan', 'url' => ['/site/biodata-pencacahan']],
                        ['label' => 'Mitra Pengolahan', 'url' => ['/site/biodata-pengolahan']],
                    ],
                ];
              

                $menuItems[] = ['label' => 'Entri Mitra',
                    'items' => [
                        ['label' => 'Mitra Pencacahan', 'url' => Url::toRoute('/mitra-pencacahan/create')],
                        ['label' => 'Mitra Pengolahan', 'url' => Url::toRoute('/mitra-pengolahan/create')],
                    ],
                ];
                $menuItems[] = ['label' => 'Kegiatan', 'url' => Url::toRoute('/kegiatan/index')];

                $menuItems[] = ['label' => 'Penilaian Kinerja',
                    'items' => [
                        ['label' => 'Mitra Pencacahan', 'url' => Url::toRoute('/nilai-pencacahan')],
                        '<li class="divider"></li>',
//                 '<li class="dropdown-header">Dropdown Header</li>',
                        ['label' => 'Mitra Pengolahan', 'url' => Url::toRoute('/nilai-pengolahan')],
                    ],
                ];
                $menuItems[] = ['label' => 'Rekomendasi',
                    'items' => [
                        ['label' => 'Mitra Pencacahan', 'url' => ['/site/rekomendasi-pencacahan']],
                        ['label' => 'Mitra Pengolahan', 'url' => ['/site/rekomendasi-pengolahan']],
                    ],
                ];
//                 $menuItems[] = ['label' => 'Rekap',
//                    'items' => [
//                        ['label' => 'Kegiatan Mitra Pencacahan', 'url' => ['/site/rekomendasi-pencacahan']],
//                        ['label' => 'Kegiatan Mitra Pengolahan', 'url' => ['/site/rekomendasi-pencacahan']],
//                        ['label' => 'Rekap Nilai Mitra Pencacahan', 'url' => ['/site/rekomendasi-pencacahan']],
//                        ['label' => 'Rekap Nilai Mitra Pengolahan', 'url' => ['/site/rekomendasi-pencacahan']],
//                    ],
//                ];
                 
                 $menuItems[] = ['label' => 'Download','url'=>Url::to('http://s.bps.go.id/simmistik')];
                
                $menuItems[] = '<li>'
                        . Html::beginForm(['/site/logout'], 'post')
                        . Html::submitButton(
                                'Keluar(' . Yii::$app->user->identity->username . ')', ['class' => 'btn btn-link logout']
                        )
                        . Html::endForm()
                        . '</li>';
            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'encodeLabels' => false,
                'items' => $menuItems,
            ]);
            NavBar::end();
            ?>

            <div class="container">
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>
                <?= Alert::widget() ?>
            </div>   
            <?= $content ?>
        </div>
        <footer class="bs-docs-footer"> <div class="container text-center">
                <div>Badan Pusat Statistik Kabupaten Hulu Sungai Utara <br>
                    Jln. H. Saberan Effendi RT 03, Kel. Sungai Malang, Amuntai, 71418<br>
                    Telp/Fax. (0527) 61049</div> 
                <div>Hubungi Kami:</div>
                <div>
                    <ul class="bs-docs-footer-links"> 

                        <li>
                            <a class="white-text sosial" href="http://fb.com/BPSHSU6308">
                                <i class="fa fa-2x fa-facebook-official"></i>
                            </a>
                        </li>
                        <li>
                            <a class="white-text sosial" href="mailto:bps6308@bps.go.id">
                                <i class="fa fa-2x fa-envelope"></i>
                            </a>
                        </li>
                        <li>
                            <a class="white-text sosial" href="http://hulusungaiutarakab.bps.go.id">
                                <i class="fa fa-2x fa-globe"></i>
                            </a>
                        </li>
                    </ul> 

                </div>

            </div> </footer>
        

        <a class="btn btn-teal col-sm-offset-11" id="back-to-top" href="#" role="button"><span class="glyphicon glyphicon-arrow-up"></span></a>

        <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
