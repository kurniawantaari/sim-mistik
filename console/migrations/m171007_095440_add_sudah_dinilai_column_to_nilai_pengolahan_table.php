<?php

use yii\db\Migration;

/**
 * Handles adding sudah_dinilai to table `nilai_pengolahan`.
 */
class m171007_095440_add_sudah_dinilai_column_to_nilai_pengolahan_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('nilai_pengolahan', 'sudah_dinilai', $this->boolean()->defaultValue(FALSE));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('nilai_pengolahan', 'sudah_dinilai');
    }
}
