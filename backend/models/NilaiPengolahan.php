<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "nilai_pengolahan".
 *
 * @property integer $id
 * @property integer $idmitra
 * @property integer $idkegiatan
 * @property integer $waktu_edit
 * @property integer $kecepatan_edit
 * @property integer $kesalahan_edit
 * @property integer $waktu_entri
 * @property integer $kecepatan_entri
 * @property integer $kesalahan_entri
 * @property integer $r_nilai
 * @property boolean $sudah_dinilai
 * @property integer $created_at
 * @property integer $created_by
 * @property integer $updated_at
 * $property integer $updated_by
 *
 * @property Kegiatan $idkegiatan0
 * @property MitraPengolahan $idmitra0
 */
class NilaiPengolahan extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'nilai_pengolahan';
    }

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            TimestampBehavior::className(),
            BlameableBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['idmitra', 'idkegiatan', 'sudah_dinilai'], 'required'],
            [['sudah_dinilai'], 'boolean'],
            [['idmitra', 'idkegiatan', 'waktu_edit', 'kecepatan_edit', 'kesalahan_edit', 'waktu_entri', 'kecepatan_entri', 'kesalahan_entri', 'r_nilai'], 'integer'],
            [['kecepatan_edit', 'kesalahan_edit', 'kecepatan_entri', 'kesalahan_entri', 'r_nilai'], 'compare', 'compareValue' => 0, 'operator' => '>=', 'type' => 'number'],
            [['kecepatan_edit', 'kesalahan_edit', 'kecepatan_entri', 'kesalahan_entri', 'r_nilai'], 'compare', 'compareValue' => 10, 'operator' => '<=', 'type' => 'number'],
            [['idkegiatan'], 'exist', 'skipOnError' => true, 'targetClass' => Kegiatan::className(), 'targetAttribute' => ['idkegiatan' => 'id']],
            [['idmitra'], 'exist', 'skipOnError' => true, 'targetClass' => MitraPengolahan::className(), 'targetAttribute' => ['idmitra' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'idmitra' => Yii::t('app', 'Idmitra'),
            'idkegiatan' => Yii::t('app', 'Idkegiatan'),
            'waktu_edit' => Yii::t('app', 'Rata-rata Waktu Edit (menit/dokumen)'),
            'kecepatan_edit' => Yii::t('app', 'Nilai Kecepatan Edit'),
            'kesalahan_edit' => Yii::t('app', 'Nilai Kesalahan Edit'),
            'waktu_entri' => Yii::t('app', 'Rata-rata Waktu Entri (menit/dokumen)'),
            'kecepatan_entri' => Yii::t('app', 'Nilai Kecepatan Entri'),
            'kesalahan_entri' => Yii::t('app', 'Nilai Kesalahan Entri'),
            'r_nilai' => Yii::t('app', 'Rata-rata Total Nilai'),
            'sudah_dinilai' => Yii::t('app', 'Apakah sudah dinilai?'),
            'created_by' => Yii::t('app', 'Dibuat oleh'),
            'created_at' => Yii::t('app', 'Dibuat pada'),
            'updated_by' => Yii::t('app', 'Diubah oleh'),
            'updated_at' => Yii::t('app', 'Diubah pada'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdkegiatan0() {
        return $this->hasOne(Kegiatan::className(), ['id' => 'idkegiatan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdmitra0() {
        return $this->hasOne(MitraPengolahan::className(), ['id' => 'idmitra']);
    }

    /**
     * @inheritdoc
     * @return NilaiPengolahanQuery the active query used by this AR class.
     */
    public static function find() {
        return new NilaiPengolahanQuery(get_called_class());
    }

}
