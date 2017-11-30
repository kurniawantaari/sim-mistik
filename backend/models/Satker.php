<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "satker".
 *
 * @property integer $id
 * @property string $satker_pendek
 * @property string $satker
 */
class Satker extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'satker';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['satker_pendek', 'satker'], 'required'],
            [['satker_pendek', 'satker'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'satker_pendek' => Yii::t('app', 'Satker Pendek'),
            'satker' => Yii::t('app', 'Satker'),
        ];
    }

    /**
     * @inheritdoc
     * @return SatkerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SatkerQuery(get_called_class());
    }
}
