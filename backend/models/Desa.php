<?php
namespace backend\models;

use Yii;

/**
 * This is the model class for table "desa".
 *
 * @property string $kdprov
 * @property string $kdkab
 * @property string $kdkec
 * @property string $kddesa
 * @property string $nmdesa
 */
class Desa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'desa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kdprov', 'kdkab', 'kdkec', 'kddesa', 'nmdesa'], 'required'],
            [['kdprov', 'kdkab'], 'string', 'max' => 2],
            [['kdkec', 'kddesa'], 'string', 'max' => 3],
            [['nmdesa'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kdprov' => Yii::t('app', 'Kode Provinsi'),
            'kdkab' => Yii::t('app', 'Kode Kabupaten'),
            'kdkec' => Yii::t('app', 'Kode Kecamatan'),
            'kddesa' => Yii::t('app', 'Kode Desa'),
            'nmdesa' => Yii::t('app', 'Nama Desa'),
        ];
    }

    /**
     * @inheritdoc
     * @return DesaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DesaQuery(get_called_class());
    }
}
