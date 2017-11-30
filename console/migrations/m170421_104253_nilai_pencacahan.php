<?php

use yii\db\Migration;

class m170421_104253_nilai_pencacahan extends Migration {

    public function up() {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%nilai_pencacahan}}', [
            'id' => $this->primaryKey(),
            'idmitra' => $this->integer()->notNull(),
            'idkegiatan' => $this->integer()->notNull(),
            'konsep' => $this->smallInteger(),
            'isian' => $this->smallInteger(),
            'tulisan' => $this->smallInteger(),
            'waktu' => $this->smallInteger(),
            'kerjasama' => $this->smallInteger(),
            'koordinasi' => $this->smallInteger(),
            'sop1' => $this->boolean(),
            'sop2' => $this->boolean(),
            'sop3' => $this->boolean(),
            'sop4' => $this->boolean(),
            'sop5' => $this->boolean(),
            'sop' => $this->smallInteger(),
            'persen_error' => $this->smallInteger(),
            'pascakomputerisasi' => $this->smallInteger(),
            'r_nilai' => $this->smallInteger(), //untuk keperluan filter
            'created_by'=>$this->integer()->notNull(),
            'updated_by'=>$this->integer()->notNull(),
            'created_at'=>$this->integer()->notNull(),
            'updated_at'=>$this->integer()->notNull(),
                ], $tableOptions);
        // creates index for column `id_mitra`
        $this->createIndex(
                'idxpencacahan-id_mitra', 'nilai_pencacahan', 'idmitra'
        );

        // add foreign key for table `id_mitra`
        $this->addForeignKey(
                'fkpencacahan-id_mitra', 'nilai_pencacahan', 'idmitra', 'mitra_pencacahan', 'id', 'CASCADE'
        );
        // creates index for column `id_kegiatan`
        $this->createIndex(
                'idxpencacahan-id_kegiatan', 'nilai_pencacahan', 'idkegiatan'
        );

        // add foreign key for table `id_kegiatan`
        $this->addForeignKey(
                'fkpencacahan-id_kegiatan', 'nilai_pencacahan', 'idkegiatan', 'kegiatan', 'id', 'CASCADE'
        );
    }

    public function down() {
        // drops foreign key for table `mitra`
        $this->dropForeignKey(
                'fkpencacahan-id_mitra', 'nilai_pencacahan'
        );


        // drops index for column `id_mitra`
        $this->dropIndex(
                'idxpencacahan-id_mitra', 'nilai_pencacahan'
        );

        // drops foreign key for table `kegiatan`
        $this->dropForeignKey(
                'fkpencacahan-id_kegiatan', 'nilai_pencacahan'
        );

        // drops index for column `id_kegiatan`
        $this->dropIndex(
                'idxpencacahan-id_kegiatan', 'nilai_pencacahan'
        );

        $this->dropTable('{{%nilai_pencacahan}}');
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
