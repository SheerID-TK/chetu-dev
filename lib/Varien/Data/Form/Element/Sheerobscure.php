<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category   Varien
 * @package    Varien_Data
 * @copyright  Copyright (c) 2008 Irubin Consulting Inc. DBA Varien (http://www.varien.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Form text element
 *
 * @category   Varien
 * @package    Varien_Data
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class Varien_Data_Form_Element_Sheerobscure extends Varien_Data_Form_Element_Abstract
{
    /**
     * @var string
     */
    protected $_obscuredValue = '******';

	public function __construct($attributes=array()) 
    {
        parent::__construct($attributes);
        $this->setType('text');
        $this->setExtType('textfield');
    }
	
	public function getElementHtml()
    { 
		$block = Mage::app()->getLayout()->createBlock('core/template')->setData('sheerdata', $this)->setTemplate('sheerobsecure.phtml')->toHtml();
		return $block;
		
		$data = $this->getEscapedValue();
		$html = '<input id="'.$this->getHtmlId().'" name="'.$this->getName()
            .'" value="'.$data[1].'" '.$this->serialize($this->getHtmlAttributes()).'/>'."\n";
		$html.= $this->getAfterElementHtml();
        return $html;
	
    }
    
    /*public function getHtml()
    {
        $this->addClass('input-text');
        return parent::getHtml();
    }*/
	
    /**
     * Hide value to make sure it will not show in HTML
     *
     * @param string $index
     * @return string
     */
    public function getEscapedValue($index = null)
    {
		$value = parent::getEscapedValue($index);
		if (empty($value)) {
            return '';
        }
		$customized = '*************';
		$customized.= substr($value, -5);
		$dataarray = array($value,$customized); 
        return $dataarray;
    }

    /**
     * Returns list of html attributes possible to output in HTML
     *
     * @return array()
     */
    public function getHtmlAttributes()
    {
        return array('type', 'title', 'class', 'style', 'onclick', 'onchange', 'onkeyup', 'disabled', 'readonly', 'maxlength', 'tabindex');
    }
}
