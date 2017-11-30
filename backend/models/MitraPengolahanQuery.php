<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[MitraPengolahan]].
 *
 * @see MitraPengolahan
 */
class MitraPengolahanQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return MitraPengolahan[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MitraPengolahan|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
