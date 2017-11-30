<?php

use yii\db\Migration;

class m130524_211442_admin extends Migration {

    public function up() {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%admin}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'unit' => $this->string()->notNull(),
            'auth_key' => $this->string(32)->notNull(),
            'email' => $this->string()->notNull()->unique(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            
                ], $tableOptions);

        $this->insert('admin', array(
            'username' => 'ipds6308',
            'password_hash' => Yii::$app->security->generatePasswordHash('admin'),
            'unit' => 'BPS Hulu Sungai Utara',
            'auth_key' => Yii::$app->security->generateRandomString(),
            'email' => 'eko.lestari@bps.go.id',
           
        ));
    }

    public function down() {
        $this->dropTable('{{%admin}}');
    }

}
