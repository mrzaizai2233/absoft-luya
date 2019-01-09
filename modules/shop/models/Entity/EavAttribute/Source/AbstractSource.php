<?php
namespace app\modules\shop\models\Entity\EavAttribute\Source;

abstract class AbstractSource {

    protected $_attribute;

    protected $_options = null;

    public function setAttribute($attribute){
        $this->_attribute = $attribute;
        return $this;
    }


    public function getAttribute()
    {
        return $this->_attribute;
    }

    /**
     * Get a text for option value
     *
     * @param  string|int $value
     * @return string|bool
     */
    public function getOptionText($value)
    {
        $options = $this->getAllOptions();
        // Fixed for tax_class_id and custom_design
        if (sizeof($options) > 0) {
            foreach ($options as $option) {
                if (isset($option['value']) && $option['value'] == $value) {
                    return isset($option['label']) ? $option['label'] : $option['value'];
                }
            }
        }
        // End
        if (isset($options[$value])) {
            return $options[$value];
        }
        return false;
    }

    /**
     * @param string $value
     * @return null|string
     */
    public function getOptionId($value)
    {
        foreach ($this->getAllOptions() as $option) {
            if (strcasecmp($option['label'], $value) == 0 || $option['value'] == $value) {
                return $option['value'];
            }
        }
        return null;
    }


}