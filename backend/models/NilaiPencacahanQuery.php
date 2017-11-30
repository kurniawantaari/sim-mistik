<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[NilaiPencacahan]].
 *
 * @see NilaiPencacahan
 */
class NilaiPencacahanQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return NilaiPencacahan[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return NilaiPencacahan|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
