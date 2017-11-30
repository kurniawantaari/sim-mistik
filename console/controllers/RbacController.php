<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;
use common\models\User;

class RbacController extends Controller {

    public function actionInit() {

        $auth = Yii::$app->authManager;

//        $auth = new DbManager;
//        $auth->init();
        // add "mengelolaAkun" permission
        $mengelolaAkun = $auth->createPermission('mengelolaAkun');
        $mengelolaAkun->description = 'Mengelola akun pengguna sistem';
        $auth->add($mengelolaAkun);

        // add "mengelolaKegiatan" permission
        $mengelolaKegiatan = $auth->createPermission('mengelolaKegiatan');
        $mengelolaKegiatan->description = 'Mengelola kegiatan, termasuk assign mitra dan stop kegiatan tertentu';
        $auth->add($mengelolaKegiatan);

        // add "mengelolaMitraPengolahan" permission
        $mengelolaMitraPengolahan = $auth->createPermission('mengelolaMitraPengolahan');
        $mengelolaMitraPengolahan->description = 'Mengelola data-data mitra pengolahan';
        $auth->add($mengelolaMitraPengolahan);

        // add "mengelolaMitraPencacahan" permission
        $mengelolaMitraPencacahan = $auth->createPermission('mengelolaMitraPencacahan');
        $mengelolaMitraPencacahan->description = 'Mengelola data-data mitra pencacahan';
        $auth->add($mengelolaMitraPencacahan);

        // add "assignMitraPengolahan" permission
        $assignMitraPengolahan = $auth->createPermission('assignMitraPengolahan');
        $assignMitraPengolahan->description = 'Menentukan kegiatan mitra pengolahan';
        $auth->add($assignMitraPengolahan);

        // add "assignMitraPencacahan" permission
        $assignMitraPencacahan = $auth->createPermission('assignMitraPencacahan');
        $assignMitraPencacahan->description = 'Menentukan kegiatan mitra pencacahan';
        $auth->add($assignMitraPencacahan);

        // add "menilaiMitraPengolahan" permission
        $menilaiMitraPengolahan = $auth->createPermission('menilaiMitraPengolahan');
        $menilaiMitraPengolahan->description = 'Memberi penilaian mitra pengolahan';
        $auth->add($menilaiMitraPengolahan);

        // add "menilaiMitraPencacahan" permission
        $menilaiMitraPencacahan = $auth->createPermission('menilaiMitraPencacahan');
        $menilaiMitraPencacahan->description = 'Memberi penilaian mitra pencacahan';
        $auth->add($menilaiMitraPencacahan);

        // add "menilaiPascakomputerisasi" permission
        $menilaiPascakomputerisasi = $auth->createPermission('menilaiPascakomputerisasi');
        $menilaiPascakomputerisasi->description = 'Memberi penilaian mitra pencacahan pasca komputerisasi';
        $auth->add($menilaiPascakomputerisasi);

        // add "melihatRekomendasi" permission
        $melihatRekomendasi = $auth->createPermission('melihatRekomendasi');
        $melihatRekomendasi->description = 'Melihat rekomendasi dan biodata mitra';
        $auth->add($melihatRekomendasi);

        // add "melihatRekapNilai" permission
        $melihatRekapNilai = $auth->createPermission('melihatRekapNilai');
        $melihatRekapNilai->description = 'Melihat rekap nilai mitra';
        $auth->add($melihatRekapNilai);

        // add "melihatKegiatandanMitra" permission
        $melihatKegiatandanMitra = $auth->createPermission('melihatKegiatandanMitra');
        $melihatKegiatandanMitra->description = 'Melihat kegiatan dan mitra yang terlibat dalam kegiatan tsb.';
        $auth->add($melihatKegiatandanMitra);

        $role_sm_cacah = $auth->createRole('Subject Matter Pencacahan');
        $auth->add($role_sm_cacah);
        $auth->addChild($role_sm_cacah, $mengelolaMitraPencacahan);
        $auth->addChild($role_sm_cacah, $assignMitraPencacahan);
        $auth->addChild($role_sm_cacah, $menilaiMitraPencacahan);
        $auth->addChild($role_sm_cacah, $melihatRekomendasi);

        $role_sm_olah = $auth->createRole('Subject Matter Pengolahan');
        $auth->add($role_sm_olah);
        $auth->addChild($role_sm_olah, $mengelolaMitraPengolahan);
        $auth->addChild($role_sm_olah, $assignMitraPengolahan);
        $auth->addChild($role_sm_olah, $menilaiMitraPengolahan);
        $auth->addChild($role_sm_olah, $menilaiPascakomputerisasi);
        $auth->addChild($role_sm_olah, $melihatRekomendasi);

        $role_supervisor = $auth->createRole('Supervisor');
        $auth->add($role_supervisor);
        $auth->addChild($role_supervisor, $melihatKegiatandanMitra);
        $auth->addChild($role_supervisor, $melihatRekapNilai);



        $role_admin = $auth->createRole('Administrator');
        $auth->add($role_admin);
        $auth->addChild($role_admin, $mengelolaAkun);
        $auth->addChild($role_admin, $mengelolaKegiatan);
        $auth->addChild($role_admin, $role_sm_cacah);
        $auth->addChild($role_admin, $role_sm_olah);
        $auth->addChild($role_admin, $role_supervisor);
    }
    
    public function actionDefaultuser(){
        
         $user = new User();
        $user->username = 'admin';
        $user->nama = 'Administrator';
        $user->nip_baru = '000000000000000000';
        $user->satker = 'Seksi Integrasi Pengolahan dan Diseminasi Statistik Kab. HSU';
        $user->email = 'lestari.ekowahyu@gmail.com';
        $user->setPassword('admincantik');
        $user->generateAuthKey();
        $user->save(false);

        $auth = \Yii::$app->authManager;
        $authorRole = $auth->getRole('Administrator');
        $auth->assign($authorRole, $user->getId());
    }
    

}
