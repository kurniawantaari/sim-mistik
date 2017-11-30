<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "kegiatan".
 *
 * @property integer $id
 * @property string $nama
 * @property string $tahun
 * @property string $seksi
 * @property string $tanggal_mulai
 * @property string $tanggal_selesai
 * @property integer $created_at
 * @property integer $created_by
 * @property integer $updated_at
 * $property integer $updated_by
 *
 * @property NilaiPencacahan[] $nilaiPencacahans
 * @property NilaiPengolahan[] $nilaiPengolahans
 */
class Kegiatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kegiatan';
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
    public function rules()
    {
        return [
            [['nama', 'tahun', 'seksi', 'tanggal_mulai', 'tanggal_selesai','created_at','created_by','updated_at','updated_by'], 'required'],
            [['tanggal_mulai', 'tanggal_selesai'], 'safe'],
            [['nama', 'seksi'], 'string', 'max' => 255],
            [['tahun'], 'string', 'max' => 4],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nama' => Yii::t('app', 'Nama Kegiatan'),
            'tahun' => Yii::t('app', 'Tahun Pelaksanaan'),
            'seksi' => Yii::t('app', 'Seksi Pelaksana'),
            'tanggal_mulai' => Yii::t('app', 'Tanggal Mulai'),
            'tanggal_selesai' => Yii::t('app', 'Tanggal Selesai'),
            'created_by'=> Yii::t('app','Dibuat oleh'),
            'created_at'=> Yii::t('app','Dibuat pada'),
            'updated_by'=>Yii::t('app','Diubah oleh'),
            'updated_at'=>Yii::t('app','Diubah pada'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNilaiPencacahans()
    {
        return $this->hasMany(NilaiPencacahan::className(), ['idkegiatan' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNilaiPengolahans()
    {
        return $this->hasMany(NilaiPengolahan::className(), ['idkegiatan' => 'id']);
    }

    /**
     * @inheritdoc
     * @return KegiatanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new KegiatanQuery(get_called_class());
    }
}
