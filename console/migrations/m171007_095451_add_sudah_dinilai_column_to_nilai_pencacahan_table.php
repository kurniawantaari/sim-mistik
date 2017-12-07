<?php

use yii\db\Migration;

/**
 * Handles adding sudah_dinilai to table `nilai_pencacahan`.
 */
class m171007_095451_add_sudah_dinilai_column_to_nilai_pencacahan_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('nilai_pencacahan', 'sudah_dinilai', $this->boolean()->defaultValue(FALSE));
         $this->addColumn('nilai_pencacahan', 'sudah_dinilai_pengolahan', $this->boolean()->defaultValue(FALSE));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('nilai_pencacahan', 'sudah_dinilai');
        $this->dropColumn('nilai_pencacahan', 'sudah_dinilai_pengolahan');
        
    }
}
