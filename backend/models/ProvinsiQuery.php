<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Provinsi]].
 *
 * @see Provinsi
 */
class ProvinsiQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Provinsi[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Provinsi|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
