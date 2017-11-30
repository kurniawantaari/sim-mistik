<?php

namespace backend\models;
/**
 * This is the ActiveQuery class for [[Desa]].
 *
 * @see Desa
 */
class DesaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Desa[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Desa|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
