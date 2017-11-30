<?php

use yii\helpers\Url;
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
        echo
        dmstr\widgets\Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu'],
                    'items' => [
                        ['label' => 'Beranda',
                            'url' => ['/site/index'],
                            'icon' => 'home',
                            'class' => 'nav-item'
                        ],
                        [
                            'label' => 'Kegiatan',
                            'icon' => 'dashboard',
                            'url' => Url::toRoute('/kegiatan/index'),
                        ],
                        ['label' => 'Biodata',
                            'items' => [
                                ['label' => 'Mitra Pencacahan', 'url' => ['/site/biodata-pencacahan']],
                                ['label' => 'Mitra Pengolahan', 'url' => ['/site/biodata-pengolahan']],
                            ],
                        ],
                        ['label' => 'Mitra',
                            'items' => [
                                ['label' => 'Mitra Pencacahan', 'icon' => 'user', 'url' => Url::toRoute('/mitra-pencacahan/index')],
                                ['label' => 'Mitra Pengolahan', 'icon' => 'tv', 'url' => Url::toRoute('/mitra-pengolahan/index')],
                            ],
                        ],
                        ['label' => 'Entri Mitra',
                            'items' => [
                                ['label' => 'Mitra Pencacahan', 'url' => Url::toRoute('/mitra-pencacahan/create')],
                                ['label' => 'Mitra Pengolahan', 'url' => Url::toRoute('/mitra-pengolahan/create')],
                            ],
                        ],
                        [
                            'label' => 'Penilaian Kinerja',
                            'icon' => 'star-half-o',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Mitra Pencacahan', 'icon' => 'user', 'url' => Url::toRoute('/nilai-pencacahan'),],
                                ['label' => 'Mitra Pengolahan', 'icon' => 'tv', 'url' => Url::toRoute('/nilai-pengolahan'),],
                            ],
                        ],
                        ['label' => 'Rekomendasi',
                            'icon' => 'thumbs-o-up',
                            'items' => [
                                ['label' => 'Mitra Pencacahan', 'icon' => 'user', 'url' => ['/site/rekomendasi-pencacahan']],
                                ['label' => 'Mitra Pengolahan', 'icon' => 'tv', 'url' => ['/site/rekomendasi-pengolahan']],
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
                                ['label' => 'Users', 'icon' => 'user-circle', 'url' => ['/user/index'],],
                            ],
                        ],
                        [
                            'label' => 'Wilayah',
                            'icon' => 'globe',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Provinsi', 'icon' => 'random', 'url' => ['/provinsi/index'],],
                                ['label' => 'Kabupaten', 'icon' => 'tasks', 'url' => ['/kabupaten/index'],],
                                ['label' => 'Kecamatan', 'icon' => 'user-circle', 'url' => ['/kecamatan/index'],],
                                ['label' => 'Desa', 'icon' => 'user-circle', 'url' => ['/desa/index'],],
                            ],
                        ],
                    ],
                ]
        );
        ?>

    </section>

</aside>
