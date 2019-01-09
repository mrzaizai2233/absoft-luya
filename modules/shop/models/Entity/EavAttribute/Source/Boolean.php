<?php
/**
 * Boolean
 *
 * @copyright Copyright © 2019 Absoft. All rights reserved.
 * @author    dattt@absoft.com.vn
 */

namespace app\modules\shop\models\Entity\EavAttribute\Source;

use app\modules\shop\models\Entity\EavAttribute\Source\AbstractSource;
use Yii;
class Boolean extends AbstractSource
{
    /**
     * Option values
     */
    const VALUE_YES = 1;

    const VALUE_NO = 0;

    public function getAllOptions(){
        if($this->_options === null){
            $this->_options =[
              ['label'=> Yii::t('app','Yes'),'value'=>self::VALUE_YES],
              ['label'=> Yii::t('app','No'),'value'=>self::VALUE_NO]
            ];
        }
        return $this->_options;
    }

    /**
     * Retrieve option array
     *
     * @return array
     */
    public function getOptionArray()
    {
        $_options = [];
        foreach ($this->getAllOptions() as $option) {
            $_options[$option['value']] = $option['label'];
        }
        return $_options;
    }
}