<?php

use yii\helpers\Url;
use hscstudio\mimin\components\Mimin;
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">

                <img src="<?php
                echo Url::to('@web/img/User_Avatar.jpg');
                ?>" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?php echo Yii::$app->user->identity->username; ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>

            </div>
        </div>


        <!--         search form 
                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search..."/>
                      <span class="input-group-btn">
                        <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                        </button>
                      </span>
                    </div>
                </form>
                 /.search form -->
        <?php
        $menuItems = [
            ['label' => 'Beranda',
                'url' => ['/site/index'],
                'icon' => 'home',
                'class' => 'nav-item'
            ],
            ['label' => 'Menu Utama', 'options' => ['class' => 'header']],
            ['label' => 'Entri Mitra',
                'icon' => 'keyboard-o',
                'items' => [
                    ['label' => 'Mitra Pencacahan', 'icon' => 'file-text', 'url' => Url::toRoute('/mitra-pencacahan/create')],
                    ['label' => 'Mitra Pengolahan', 'icon' => 'tv', 'url' => Url::toRoute('/mitra-pengolahan/create')],
                ],
            ],
            [
                'label' => 'Kegiatan',
                'icon' => 'calendar',
                'url' => Url::toRoute('/kegiatan/index'),
            ],
             [
                'label' => 'Penilaian Kinerja',
                'icon' => 'star-half-o',
                'url' => '#',
                'items' => [
                    ['label' => 'Mitra Pencacahan', 'icon' => 'file-text', 'url' => Url::toRoute('/nilai-pencacahan'),],
                    ['label' => 'Mitra Pengolahan', 'icon' => 'tv', 'url' => Url::toRoute('/nilai-pengolahan'),],
                ],
            ],
            ['label' => 'Data Mitra', 'options' => ['class' => 'header']],
            
            ['label' => 'Rekomendasi',
                'icon' => 'thumbs-o-up',
                'items' => [
                    ['label' => 'Mitra Pencacahan', 'icon' => 'file-text', 'url' => ['/site/rekomendasi-pencacahan']],
                    ['label' => 'Mitra Pengolahan', 'icon' => 'tv', 'url' => ['/site/rekomendasi-pengolahan']],
                ],
            ],
            ['label' => 'Biodata',
                'icon' => 'address-card',
                'items' => [
                    ['label' => 'Mitra Pencacahan', 'icon' => 'file-text', 'url' => ['/site/biodata-pencacahan']],
                    ['label' => 'Mitra Pengolahan', 'icon' => 'tv', 'url' => ['/site/biodata-pengolahan']],
                ],
            ],
           
            ['label' => 'Mitra',
                'icon' => 'child',
                'items' => [
                    ['label' => 'Mitra Pencacahan', 'icon' => 'file-text', 'url' => Url::toRoute('/mitra-pencacahan/index')],
                    ['label' => 'Mitra Pengolahan', 'icon' => 'tv', 'url' => Url::toRoute('/mitra-pengolahan/index')],
                ],
            ],
            ['label' => 'Lain-lain', 'options' => ['class' => 'header']],
            [
                'label' => 'Master Wilayah',
                'icon' => 'globe',
                'url' => '#',
                'items' => [
                    ['label' => 'Provinsi', 'icon' => 'location-arrow', 'url' => ['/provinsi/index'],],
                    ['label' => 'Kabupaten', 'icon' => 'location-arrow', 'url' => ['/kabupaten/index'],],
                    ['label' => 'Kecamatan', 'icon' => 'location-arrow', 'url' => ['/kecamatan/index'],],
                    ['label' => 'Desa', 'icon' => 'location-arrow', 'url' => ['/desa/index'],],
                ],
            ],
            [
                'label' => 'Pengguna',
                'icon' => 'users',
                'url' => '#',
                'items' => [
                    ['label' => 'Route', 'icon' => 'random', 'url' => ['/mimin/route'],],
                    ['label' => 'Level Akses', 'icon' => 'tasks', 'url' => ['/mimin/role'],],
                    ['label' => 'Tambah Pengguna', 'icon' => 'user-plus', 'url' => ['/site/signup'],],
                    ['label' => 'Users', 'icon' => 'user-circle', 'url' => ['/mimin/user'],],
                ],
            ],
            [
                'label' => 'Download<sup><i class="fa fa-external-link" style="padding-left:7px;"></i></sup>',
                'icon' => 'download',
                'encode'=>false,
                'url' => 'http://s.bps.go.id/simmistik',
                 'template'=> '<a href="{url}" target="_blank">'
                . '{icon}{label}'
                . '</a>',
            ],
        ];

        // $menuItems = Mimin::filterMenu($menuItems);
        echo dmstr\widgets\Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu'],
                    'items' => $menuItems,
                ]
        );
        ;
        ?>

    </section>

</aside>
