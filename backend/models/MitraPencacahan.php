<?php

namespace backend\models;

use Yii;
use common\models\User;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "mitra_pencacahan".
 *
 * @property integer $id
 * @property string $nik
 * @property string $nama
 * @property string $nama_panggilan
 * @property string $jk
 * @property string $alamat
 * @property string $kdprov
 * @property string $kdkab
 * @property string $kdkec
 * @property string $kddesa
 * @property string $tmptlahir
 * @property string $tgllahir
 * @property integer $kdpendidikan
 * @property string $pekerjaan
 * @property string $status
 * @property boolean $android
 * @property string $hp1
 * @property string $hp2
 * @property string $email
 * @property string $npwp
 * @property string $rekening
 * @property string $foto
 * @property integer $nilai
 * @property string $kategori_nilai
 * @property boolean $sedang_survei
 * @property integer $created_at
 * @property integer $update_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property MasterPendidikan $kdpendidikan0
 * @property User $editBy
 * @property NilaiPencacahan[] $nilaiPencacahans
 */
class MitraPencacahan extends \yii\db\ActiveRecord {

    public $file;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'mitra_pencacahan';
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
            [['nik', 'nama', 'jk', 'alamat', 'kdprov', 'kdkab', 'kdkec', 'kddesa', 'hp1'], 'required'],
            [['tgllahir', 'last_edit'], 'safe'],
            [['kdpendidikan', 'nilai'], 'integer'],
            [['android', 'sedang_survei'], 'boolean'],
            [['nik'], 'string', 'max' => 16],
            [['nama', 'nama_panggilan', 'alamat', 'tmptlahir', 'pekerjaan', 'hp1', 'hp2', 'email', 'npwp', 'rekening', 'foto', 'kategori_nilai'], 'string', 'max' => 255],
            [['jk', 'status'], 'string', 'max' => 1],
            [['kdprov', 'kdkab'], 'string', 'max' => 2],
            [['kdkec', 'kddesa'], 'string', 'max' => 3],
            [['nik'], 'unique'],
            [['kdpendidikan'], 'exist', 'skipOnError' => true, 'targetClass' => MasterPendidikan::className(), 'targetAttribute' => ['kdpendidikan' => 'kdpendidikan']],
            // checks if "file" to be imported is a valid image with proper size
            [['file'], 'image', 'extensions' => 'jpg',
                'minWidth' => 200, 'maxWidth' => 200,
                'minHeight' => 300, 'maxHeight' => 300,
                'mimeTypes' => 'image/jpeg',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'nik' => Yii::t('app', 'NIK'),
            'nama' => Yii::t('app', 'Nama Lengkap'),
            'nama_panggilan' => Yii::t('app', 'Nama Panggilan'),
            'jk' => Yii::t('app', 'Jenis Kelamin'),
            'alamat' => Yii::t('app', 'Alamat Lengkap'),
            'kdprov' => Yii::t('app', 'Provinsi'),
            'kdkab' => Yii::t('app', 'Kabupaten'),
            'kdkec' => Yii::t('app', 'Kecamatan'),
            'kddesa' => Yii::t('app', 'Desa'),
            'tmptlahir' => Yii::t('app', 'Tempat Lahir'),
            'tgllahir' => Yii::t('app', 'Tanggal Lahir'),
            'kdpendidikan' => Yii::t('app', 'Pendidikan Terakhir'),
            'pekerjaan' => Yii::t('app', 'Pekerjaan'),
            'status' => Yii::t('app', 'Status Perkawinan'),
            'android' => Yii::t('app', 'Kepemilikan Android'),
            'hp1' => Yii::t('app', 'Nomor HP yang Dapat Dihubungi'),
            'hp2' => Yii::t('app', 'Nomor HP Cadangan'),
            'email' => Yii::t('app', 'Email'),
            'npwp' => Yii::t('app', 'NPWP'),
            'rekening' => Yii::t('app', 'Bank - Nomor Rekening'),
            'foto' => Yii::t('app', 'Foto'),
            'nilai' => Yii::t('app', 'Nilai'),
            'kategori_nilai' => Yii::t('app', 'Kategori Nilai'),
            'sedang_survei' => Yii::t('app', 'Apakah Sedang Mengikuti Survei?'),
            'created_at' => Yii::t('app', 'Didaftarkan pada'),
            'updated_at' => Yii::t('app', 'Diupdate pada'),
            'created_by' => Yii::t('app', 'Didaftarkan oleh'),
            'updated_by' => Yii::t('app', 'Diupdate oleh'),
            'file' => Yii::t('app', 'Upload Foto 3*4'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKdpendidikan0() {
        return $this->hasOne(MasterPendidikan::className(), ['kdpendidikan' => 'kdpendidikan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNilaiPencacahans() {
        return $this->hasMany(NilaiPencacahan::className(), ['idmitra' => 'id']);
    }

    /**
     * @inheritdoc
     * @return MitraPencacahanQuery the active query used by this AR class.
     */
    public static function find() {
        return new MitraPencacahanQuery(get_called_class());
    }

    public static function getKabupaten($kdprov) {
        $data = Kabupaten::find()
                ->select(["concat(kdkab,' - ',nmkab) as name", "kdkab as id"])
                ->where(['kdprov' => $kdprov])
                ->asArray()
                ->all();

        return $data;
    }

    public static function getKecamatan($city_id, $kdkab) {
        $data = Kecamatan::find()
                        ->where(['kdprov' => $city_id, 'kdkab' => $kdkab])
                        ->select(["kdkec AS id", "concat (kdkec,' - ',nmkec) AS name"])->asArray()->all();

        return $data;
    }

    public static function getDesa($city_id, $kdkab, $kdkec) {
        $data = Desa::find()
                        ->where(['kdprov' => $city_id, 'kdkab' => $kdkab, 'kdkec' => $kdkec])
                        ->select(["kddesa AS id", "concat (kddesa,' - ',nmdesa) AS name"])->asArray()->all();

        return $data;
    }

}
