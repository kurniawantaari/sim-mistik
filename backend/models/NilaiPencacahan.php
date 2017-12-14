<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "nilai_pencacahan".
 *
 * @property integer $id
 * @property integer $idmitra
 * @property integer $idkegiatan
 * @property integer $konsep
 * @property integer $isian
 * @property integer $tulisan
 * @property integer $waktu
 * @property integer $kerjasama
 * @property integer $koordinasi
 * @property boolean $sop1
 * @property boolean $sop2
 * @property boolean $sop3
 * @property boolean $sop4
 * @property boolean $sop5
 * @property integer $sop
 * @property integer $persen_error
 * @property integer $pascakomputerisasi
 * @property integer $r_nilai
 * @property boolean $sudah_dinilai
 * @property boolean $sudah_dinilai_pengolahan
 * @property integer $created_at
 * @property integer $created_by
 * @property integer $updated_at
 * $property integer $updated_by
 * 
 * @property Kegiatan $idkegiatan0
 * @property MitraPencacahan $idmitra0
 */
class NilaiPencacahan extends \yii\db\ActiveRecord {

    public $daftarIDmitra;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'nilai_pencacahan';
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
            [['idmitra', 'idkegiatan', 'sudah_dinilai', 'sudah_dinilai_pengolahan'], 'required'],
            [['idmitra', 'idkegiatan', 'konsep', 'isian', 'tulisan', 'waktu', 'kerjasama', 'koordinasi', 'sop', 'persen_error', 'pascakomputerisasi', 'r_nilai'], 'integer'],
            [['sop1', 'sop2', 'sop3', 'sop4', 'sop5', 'sudah_dinilai_pengolahan','sudah_dinilai'], 'boolean'],
            //[['konsep', 'isian', 'tulisan', 'waktu', 'kerjasama', 'koordinasi', 'sop', 'pascakomputerisasi', 'r_nilai'], 'min'=>0, 'max' => 10],
   [['konsep', 'isian', 'tulisan', 'waktu', 'kerjasama', 'koordinasi', 'sop', 'pascakomputerisasi', 'r_nilai'], 'compare', 'compareValue' => 10, 'operator' => '<=', 'type' => 'number'],
            [['idkegiatan'], 'exist', 'skipOnError' => true, 'targetClass' => Kegiatan::className(), 'targetAttribute' => ['idkegiatan' => 'id']],
            [['idmitra'], 'exist', 'skipOnError' => true, 'targetClass' => MitraPencacahan::className(), 'targetAttribute' => ['idmitra' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'idmitra' => Yii::t('app', 'ID mitra'),
            'idkegiatan' => Yii::t('app', 'ID kegiatan'),
            'konsep' => Yii::t('app', 'Pemahaman Konsep'),
            'isian' => Yii::t('app', 'Kualitas Isian'),
            'tulisan' => Yii::t('app', 'Kualitas Tulisan'),
            'waktu' => Yii::t('app', 'Ketepatan Waktu'),
            'kerjasama' => Yii::t('app', 'Kerjasama dengan Pengawas'),
            'koordinasi' => Yii::t('app', 'Koordinasi dengan Subject Matter(BPS Kab/Kota)'),
            'sop1' => Yii::t('app', 'Apakah mengikuti pelatihan petugas?'),
            'sop2' => Yii::t('app', 'Apakah melakukan penggambaran peta?'),
            'sop3' => Yii::t('app', 'Apakah melakukan pemutakhiran secara door to door sesuai batas?'),
            'sop4' => Yii::t('app', 'Apakah melakukan pencacahan secara door to door?'),
            'sop5' => Yii::t('app', 'Apakah melakukan pemeriksaan dokumen hasil pencacahan?'),
            'sop' => Yii::t('app', 'Nilai kepatuhan terhadap SOP'),
            'persen_error' => Yii::t('app', 'Persentase error berdasarkan hasil editing coding dan entry'),
            'pascakomputerisasi' => Yii::t('app', 'Nilai pascakomputerisasi'),
            'r_nilai' => Yii::t('app', 'Rata-rata Nilai'),
            'sudah_dinilai' => Yii::t('app', 'Nilai pencacahan?'),
            'sudah_dinilai_pengolahan' => Yii::t('app', 'Nilai pengolahan?'),
            
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
        return $this->hasOne(MitraPencacahan::className(), ['id' => 'idmitra']);
    }

    /**
     * @inheritdoc
     * @return NilaiPencacahanQuery the active query used by this AR class.
     */
    public static function find() {
        return new NilaiPencacahanQuery(get_called_class());
    }

}
