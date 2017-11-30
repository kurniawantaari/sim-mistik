<?php

use yii\db\Migration;

class m170420_002607_mitra_pengolahan extends Migration {

    public function up() {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%mitra_pengolahan}}', [
            'id' => $this->primaryKey(),
            'nik' => $this->char(16)->notNull()->unique(), //nomor NIK KTP/KK //untuk pengecekan apakah mitra sudah pernah ikut survei
            'nama' => $this->string()->notNull(),
            'nama_panggilan' => $this->string(),
            'jk' => $this->char(1)->notNull(), //1:laki2 2:perempuan
            'alamat' => $this->string()->notNull(),
            'kdprov' => $this->char(2)->notNull(), //untuk keperluan filter
            'kdkab' => $this->char(2)->notNull(), //untuk keperluan filter
            'kdkec' => $this->char(3)->notNull(), //untuk keperluan filter
            'kddesa' => $this->char(3)->notNull(), //untuk keperluan filter
            'tmptlahir' => $this->string(),
            'tgllahir' => $this->date(),
            'kdpendidikan' => $this->smallInteger(2), //untuk keperluan filter
            'pekerjaan' => $this->string(),
            'status' => $this->char(1), //belum kawin, pernah kawin
            'android' => $this->boolean(), //kepemilikan hp android -> kedepannya untuk capi dan pengawasan berbasis gis (koordinat)
            'hp1' => $this->string()->notNull(),
            'hp2' => $this->string(),
            'email' => $this->string(),
            'npwp' => $this->string(),
            'rekening' => $this->string(),
            'foto' => $this->string()->defaultValue('uploads/avatar.jpg'),
            'nilai' => $this->smallInteger(),
            'kategori_nilai' => $this->string(), //>80 bagus, 50-79, dipertimbangkan, <50 tidak direkomendasikan
            'sedang_survei' => $this->boolean()->defaultValue(false),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
                ], $tableOptions);

//        $this->createIndex(
//                'idx_mitra_kdprov', 'mitra', 'kdprov'
//        );
//        $this->createIndex(
//                'idx_mitra_kdkab', 'mitra', 'kdkab'
//        );
//
//        $this->createIndex(
//                'idx_mitra_kdkec', 'mitra', 'kdkec'
//        );
//        $this->createIndex(
//                'idx_mitra_kddesa', 'mitra', 'kddesa'
//        );
//        $this->addForeignKey(
//                'fk_kdprov', 'mitra', 'kdprov', 'provinsi', 'kdprov', 'CASCADE'
//        );
//
//        $this->addForeignKey(
//                'fk_kdkab', 'mitra', 'kdkab', 'kabupaten', 'kdkab', 'CASCADE'
//        );
//
//        $this->addForeignKey(
//                'fk_kdkec', 'mitra', 'kdkec', 'kecamatan', 'kdkec', 'CASCADE'
//        );
//
//        $this->addForeignKey(
//                'fk_kddesa', 'mitra', 'kddesa', 'desa', 'kddesa', 'CASCADE'
//        );
        $this->createIndex(
                'idx_mitra_p_kdpendidikan', 'mitra_pengolahan', 'kdpendidikan'
        );
        $this->addForeignKey(
                'fk_kdpendidikan', 'mitra_pengolahan', 'kdpendidikan', 'master_pendidikan', 'kdpendidikan', 'CASCADE'
        );
    }

    public function down() {
        $this->dropTable('{{%mitra_pengolahan}}');
    }

    /*
      // Use safeUp/safeDown to run migration code within a transaction
      public function safeUp()
      {
      }

      public function safeDown()
      {
      }
     */
}
