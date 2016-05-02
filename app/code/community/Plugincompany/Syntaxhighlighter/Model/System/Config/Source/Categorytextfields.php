<?php
/**
 * Copyright (c) 2014-2026 Plugin Company
 *
 * This file is part of Syntax Highlighter, released under the MIT License.
 * See the LICENSE file in the project root.
 */
class Plugincompany_Syntaxhighlighter_Model_System_Config_Source_Categorytextfields {

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        $textFields = $this->toArray();

        $ret = array();

        foreach ($textFields as $code => $title) {
            $ret[] = array('value' => $code, 'label' => $title);
        }

        return $ret;
    }

    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function toArray()
    {
        $textFields = Mage::getResourceModel('catalog/category_attribute_collection');
        $textFields->addFieldToFilter('frontend_input', 'textarea');

        $ret = array();
        foreach ($textFields as $attr) {
            $ret[$attr->getAttributeCode()] = $attr->getFrontendLabel();
        }

        return $ret;
    }

}