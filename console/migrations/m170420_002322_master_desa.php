<?php

use yii\db\Migration;

class m170420_002322_master_desa extends Migration
{
  public function up()
    {
 $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
     $this->createTable('{{%desa}}', [
            'kdprov' => $this->char(2)->notNull(),
            'kdkab' => $this->char(2)->notNull(),
               'kdkec' => $this->char(3)->notNull(),
               'kddesa' => $this->char(3)->notNull(),
            'nmdesa' => $this->string(50)->notNull(),
                ], $tableOptions);
        $this->addPrimaryKey('desa_pk', 'desa', 'kdprov,kdkab,kdkec,kddesa');
       
          
    }

    public function down()
    {
        $this->dropTable('{{%desa}}');
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
