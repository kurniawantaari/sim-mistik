<?php

namespace backend\models;
use Yii;

/**
 * This is the model class for table "master_pendidikan".
 *
 * @property integer $id
 * @property integer $kdpendidikan
 * @property string $jenjang
 *
 * @property MitraPencacahan[] $mitraPencacahans
 * @property MitraPengolahan[] $mitraPengolahans
 */
class MasterPendidikan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'master_pendidikan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kdpendidikan', 'jenjang'], 'required'],
            [['kdpendidikan'], 'integer'],
            [['jenjang'], 'string', 'max' => 255],
            [['kdpendidikan'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'kdpendidikan' => Yii::t('app', 'Kode Pendidikan'),
            'jenjang' => Yii::t('app', 'Jenjang'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMitraPencacahans()
    {
        return $this->hasMany(MitraPencacahan::className(), ['kdpendidikan' => 'kdpendidikan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMitraPengolahans()
    {
        return $this->hasMany(MitraPengolahan::className(), ['kdpendidikan' => 'kdpendidikan']);
    }

    /**
     * @inheritdoc
     * @return MasterPendidikanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MasterPendidikanQuery(get_called_class());
    }
}
