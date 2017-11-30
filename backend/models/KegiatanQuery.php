<?php
namespace backend\models;

/**
 * This is the ActiveQuery class for [[Kegiatan]].
 *
 * @see Kegiatan
 */
class KegiatanQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Kegiatan[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Kegiatan|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
