<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "kabupaten".
 *
 * @property string $kdprov
 * @property string $kdkab
 * @property string $nmkab
 */
class Kabupaten extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kabupaten';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kdprov', 'kdkab', 'nmkab'], 'required'],
            [['kdprov', 'kdkab'], 'string', 'max' => 2],
            [['nmkab'], 'string', 'max' => 50],
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
            'nmkab' => Yii::t('app', 'Nama Kabupaten'),
        ];
    }

    /**
     * @inheritdoc
     * @return KabupatenQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new KabupatenQuery(get_called_class());
    }
    
    public static function getKabupaten($kdprov) {
        $data = Kabupaten::find()
                ->select('kdkab')
                ->where(['kdprov' => $kdprov])
              //  ->asArray()
                ->all();

        return $data;
    }
    
}
