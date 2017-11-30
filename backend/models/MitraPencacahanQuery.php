<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[MitraPencacahan]].
 *
 * @see MitraPencacahan
 */
class MitraPencacahanQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return MitraPencacahan[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MitraPencacahan|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
