<?php

use yii\db\Migration;

class m170420_002421_master_pendidikan extends Migration {

    public function up() {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%master_pendidikan}}', [
            'id' => $this->primaryKey(),
            'kdpendidikan' => $this->smallInteger(2)->notNull()->unique(),
            'jenjang' => $this->string()->notNull(),
                ], $tableOptions);
       
    }

    public function down() {
        $this->dropTable('{{%master_pendidikan}}');
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
