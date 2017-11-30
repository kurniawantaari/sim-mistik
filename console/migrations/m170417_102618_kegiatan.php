<?php

use yii\db\Migration;

class m170417_102618_kegiatan extends Migration {

    public function up() {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%kegiatan}}', [
            'id' => $this->primaryKey(),
            'nama' => $this->string()->notNull(),
            'tahun' => $this->char(4)->notNull(),
            'seksi' => $this->string()->notNull(), //untuk keperluan filter
            'tanggal_mulai' => $this->date()->notNull(),
            'tanggal_selesai' => $this->date()->notNull(),
             'created_by'=>$this->integer()->notNull(),
            'updated_by'=>$this->integer()->notNull(),
            'created_at'=>$this->integer()->notNull(),
            'updated_at'=>$this->integer()->notNull(),
                ], $tableOptions);
    }

    public function down() {
        $this->dropTable('{{%kegiatan}}');
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
