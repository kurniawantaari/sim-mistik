<?php

use yii\db\Migration;

class m171003_151921_satker extends Migration {

    public function up() {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%satker}}', [
            'id' => $this->primaryKey(),
            'satker_pendek' => $this->string()->notNull(),
            'satker' => $this->string()->notNull(),
                ], $tableOptions);

        $this->insert('satker', ['satker_pendek' => 'Seksi IPDS', 'satker' => 'Seksi Integrasi Pengolahan dan Diseminasi Statistik']);
        $this->insert('satker', ['satker_pendek' => 'Tata Usaha', 'satker' => 'Bagian Tata Usaha']);
        $this->insert('satker', ['satker_pendek' => 'Seksi Distribusi', 'satker' => 'Seksi Statistik Distribusi']);
        $this->insert('satker', ['satker_pendek' => 'Seksi Sosial', 'satker' => 'Seksi Statistik Sosial']);
        $this->insert('satker', ['satker_pendek' => 'Seksi Produksi', 'satker' => 'Seksi Statistik Produksi']);
        $this->insert('satker', ['satker_pendek' => 'Seksi Nerwilis', 'satker' => 'Seksi Neraca Wilayah dan Analisis Statistik']);
        $this->insert('satker', ['satker_pendek' => 'Kepala Kabupaten', 'satker' => 'Kepala Kabupaten - Kota']);
    
        
        }

    public function down() {
        $this->dropTable('{{%user}}');
    }

}
