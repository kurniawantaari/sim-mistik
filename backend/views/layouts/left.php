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

        <?php
        $menuItems = [
            ['label' => 'Beranda',
                'url' => ['/site/index'],
                'icon' => 'home',
                'class' => 'nav-item'
            ],
            ['label' => 'Dashboard',
                'url' => ['/site/dashboard'],
                'icon' => 'dashboard',
                'class' => 'nav-item',
                'template' => '<a href="{url}">{icon} {label}<span class="pull-right-container"><small class="label pull-right bg-red">segera</small></span></a>'
            ],
            ['label' => 'MENU UTAMA', 'options' => ['class' => 'header']],
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
//                'url' => '#',
                'items' => [
                    ['label' => 'Mitra Pencacahan', 'icon' => 'file-text', 'url' => Url::toRoute('/nilai-pencacahan'),],
                    ['label' => 'Mitra Pengolahan', 'icon' => 'tv', 'url' => Url::toRoute('/nilai-pengolahan'),],
                ],
            ],
            ['label' => 'DATA MITRA', 'options' => ['class' => 'header']],
            ['label' => 'Rekomendasi',
                'icon' => 'thumbs-o-up',
                'items' => [
                    ['label' => 'Mitra Pencacahan', 'icon' => 'file-text', 'url' => ['/mitra/rekomendasi-pencacahan']],
                    ['label' => 'Mitra Pengolahan', 'icon' => 'tv', 'url' => ['/mitra/rekomendasi-pengolahan']],
                ],
            ],
            ['label' => 'Biodata',
                'icon' => 'address-card',
                'items' => [
                    ['label' => 'Mitra Pencacahan', 'icon' => 'file-text', 'url' => ['/mitra/biodata-pencacahan']],
                    ['label' => 'Mitra Pengolahan', 'icon' => 'tv', 'url' => ['/mitra/biodata-pengolahan']],
                ],
            ],
            ['label' => 'Mitra',
                'icon' => 'child',
                'items' => [
                    ['label' => 'Mitra Pencacahan', 'icon' => 'file-text', 'url' => Url::toRoute('/mitra-pencacahan/index')],
                    ['label' => 'Mitra Pengolahan', 'icon' => 'tv', 'url' => Url::toRoute('/mitra-pengolahan/index')],
                ],
            ],
            ['label' => 'REKAP', 'options' => ['class' => 'header']],
            [
                'label' => 'Nilai Mitra',
                'icon' => 'bar-chart',
                'url' => Url::toRoute('/rekap/rekap-nilai'),
                'template' => '<a href="{url}">{icon} {label}<span class="pull-right-container"><small class="label pull-right bg-yellow">baru</small></span></a>'
            ],
            [
                'label' => 'Mitra - Kegiatan',
                'icon' => 'chain',
                'url' => Url::toRoute('/rekap/rekap-mitra_kegiatan'),
           'template'=>'<a href="{url}">{icon} {label}<span class="pull-right-container"><small class="label pull-right bg-yellow">baru</small></span></a>'
               
            ],
            ['label' => 'LAIN-LAIN', 'options' => ['class' => 'header']],
            [
                'label' => 'Master Wilayah',
                'icon' => 'globe',
//                'url' => '#',
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
//                'url' => '#',
                'items' => [
                    ['label' => 'Route', 'icon' => 'random', 'url' => ['/mimin/route'],],
                    ['label' => 'Level Akses', 'icon' => 'tasks', 'url' => ['/mimin/role'],],
                    ['label' => 'Tambah Pengguna', 'icon' => 'user-plus', 'url' => ['/mimin/user/create'],],
                    ['label' => 'Users', 'icon' => 'user-circle', 'url' => ['/mimin/user'],],
                ],
            ],
            [
                'label' => 'Download<sup><i class="fa fa-external-link" style="padding-left:7px;"></i></sup>',
                'icon' => 'download',
                'encode' => false,
                'url' => 'http://s.bps.go.id/simmistik',
                'template' => '<a href="{url}" target="_blank">'
                . '{icon}{label}'
                . '</a>',
            ],
        ];

        //$menuItemsfiltered = Mimin::filterMenu($menuItems);
        echo dmstr\widgets\Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                    'items' => $menuItems, //filtered,
                ]
        );
        ?>

    </section>

</aside>
