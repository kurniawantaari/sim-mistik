<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "kecamatan".
 *
 * @property string $kdprov
 * @property string $kdkab
 * @property string $kdkec
 * @property string $nmkec
 */
class Kecamatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kecamatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kdprov', 'kdkab', 'kdkec', 'nmkec'], 'required'],
            [['kdprov', 'kdkab'], 'string', 'max' => 2],
            [['kdkec'], 'string', 'max' => 3],
            [['nmkec'], 'string', 'max' => 50],
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
            'nmkec' => Yii::t('app', 'Nama Kecamatan'),
        ];
    }

    /**
     * @inheritdoc
     * @return KecamatanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new KecamatanQuery(get_called_class());
    }
}
