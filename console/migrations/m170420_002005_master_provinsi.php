<?php

use yii\db\Migration;

class m170420_002005_master_provinsi extends Migration {

    public function up() {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%provinsi}}', [
            'kdprov' => $this->char(2)->notNull()->unique(),
            'nmprov' => $this->string(50)->notNull(),
                ], $tableOptions);
        $this->addPrimaryKey('provinsi_pk','provinsi','kdprov');
    }

    public function down() {
        $this->dropTable('{{%provinsi}}');
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
