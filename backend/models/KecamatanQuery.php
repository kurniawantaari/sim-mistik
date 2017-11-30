<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[Kecamatan]].
 *
 * @see Kecamatan
 */
class KecamatanQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Kecamatan[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Kecamatan|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
