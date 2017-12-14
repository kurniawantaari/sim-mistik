<?php

use yii\db\Migration;

class m170421_104245_nilai_pengolahan extends Migration {

    public function up() {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%nilai_pengolahan}}', [
            'id' => $this->primaryKey(),
            'idmitra' => $this->integer()->notNull(),
            'idkegiatan' => $this->integer()->notNull(),
            'waktu_edit' => $this->smallInteger(),
            'kecepatan_edit' => $this->smallInteger(),
            'kesalahan_edit' => $this->smallInteger(),
            'waktu_entri' => $this->smallInteger(),
            'kecepatan_entri' => $this->smallInteger(),
            'kesalahan_entri' => $this->smallInteger(),
            'r_nilai' => $this->smallInteger(), //untuk keperluan filter
            'created_by'=>$this->integer()->notNull(),
            'updated_by'=>$this->integer()->notNull(),
            'created_at'=>$this->integer()->notNull(),
            'updated_at'=>$this->integer()->notNull(),
                ], $tableOptions);

        // creates index for column `id_mitra`
        $this->createIndex(
                'idx_pengolahan-id_mitra', 'nilai_pengolahan', 'idmitra'
        );

        // add foreign key for table `id_mitra`
        $this->addForeignKey(
                'fk_pengolahan-id_mitra', 'nilai_pengolahan', 'idmitra', 'mitra_pengolahan', 'id', 'CASCADE'
        );
        // creates index for column `id_kegiatan`
        $this->createIndex(
                'idx_pengolahan-id_kegiatan', 'nilai_pengolahan', 'idkegiatan'
        );

        // add foreign key for table `id_kegiatan`
        $this->addForeignKey(
                'fk_pengolahan-id_kegiatan', 'nilai_pengolahan', 'idkegiatan', 'kegiatan', 'id', 'CASCADE'
        );
    }

    public function down() {
        $this->dropForeignKey(
                'fk_pengolahan-id_mitra', 'nilai_pengolahan'
        );


        // drops index for column `id_mitra`
        $this->dropIndex(
                'idx_pengolahan-id_mitra', 'nilai_pengolahan'
        );

        // drops foreign key for table `kegiatan`
        $this->dropForeignKey(
                'fk_pengolahan-id_kegiatan', 'nilai_pengolahan'
        );

        // drops index for column `id_kegiatan`
        $this->dropIndex(
                'idx_pengolahan-id_kegiatan', 'nilai_pengolahan'
        );

        $this->dropTable('{{%nilai_pengolahan}}');
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
