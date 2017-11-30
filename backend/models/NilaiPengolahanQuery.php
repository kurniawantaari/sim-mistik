<?php

namespace backend\models;
/**
 * This is the ActiveQuery class for [[NilaiPengolahan]].
 *
 * @see NilaiPengolahan
 */
class NilaiPengolahanQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return NilaiPengolahan[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return NilaiPengolahan|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
