<?php

use yii\db\Migration;

class m170420_002310_master_kabupaten extends Migration {

    public function up() {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%kabupaten}}', [
            'kdprov' => $this->char(2)->notNull(),
            'kdkab' => $this->char(2)->notNull(),
            'nmkab' => $this->string(50)->notNull(),
                ], $tableOptions);
        $this->addPrimaryKey('kabupaten_pk', 'kabupaten', 'kdprov,kdkab');
              }

    public function down() {
        $this->dropTable('{{%kabupaten}}');
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
