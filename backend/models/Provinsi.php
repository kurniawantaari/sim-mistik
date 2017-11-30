<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "provinsi".
 *
 * @property string $kdprov
 * @property string $nmprov
 */
class Provinsi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'provinsi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kdprov', 'nmprov'], 'required'],
            [['kdprov'], 'string', 'max' => 2],
            [['nmprov'], 'string', 'max' => 50],
            [['kdprov'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
           'kdprov' => 'Kode Provinsi',
            'nmprov' => 'Nama Provinsi',
        ];
    }

    /**
     * @inheritdoc
     * @return ProvinsiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProvinsiQuery(get_called_class());
    }
}
