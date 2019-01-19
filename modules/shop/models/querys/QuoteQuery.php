<?php

namespace app\modules\shop\models\querys;

/**
 * This is the ActiveQuery class for [[\app\modules\shop\models\Quote]].
 *
 * @see \app\modules\shop\models\Quote
 */
class QuoteQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\modules\shop\models\Quote[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\modules\shop\models\Quote|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
