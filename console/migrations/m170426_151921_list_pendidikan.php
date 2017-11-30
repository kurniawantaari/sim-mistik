<?php

use yii\db\Migration;

class m170426_151921_list_pendidikan extends Migration {

    public function up() {

        $this->insert('master_pendidikan', ['kdpendidikan' => 5, 'jenjang' => 'SMA/sederajat']);
        $this->insert('master_pendidikan', ['kdpendidikan' => 6, 'jenjang' => 'Diploma I']);
        $this->insert('master_pendidikan', ['kdpendidikan' => 7, 'jenjang' => 'Diploma II']);
        $this->insert('master_pendidikan', ['kdpendidikan' => 8, 'jenjang' => 'Diploma III']);
        $this->insert('master_pendidikan', ['kdpendidikan' => 9, 'jenjang' => 'Diploma IV/S1']);
        $this->insert('master_pendidikan', ['kdpendidikan' => 10, 'jenjang' => 'S2/S3']);
    }

    public function down() {
         $this->delete('{{master_pendidikan}}');
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
