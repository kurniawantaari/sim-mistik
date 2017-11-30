<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[MasterPendidikan]].
 *
 * @see MasterPendidikan
 */
class MasterPendidikanQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return MasterPendidikan[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return MasterPendidikan|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
