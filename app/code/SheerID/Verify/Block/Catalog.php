<?php
class SheerID_Verify_Block_Catalog extends Mage_Core_Block_Template
{	
    protected function _construct()
    {
        parent::_construct();
		if (Mage::helper('sheerid_verify')->isSetUp()) {
	        $this->setTemplate('verify/Catalog.phtml');
		}
    }
}