<?php

require_once Mage::getModuleDir('controllers', 'Mage_Checkout') . DS . 'CartController.php';

class SheerID_Checkout_CartController extends Mage_Checkout_CartController {

    /**
     * Initialize product instance from request data
     * Override CartController for adding logics
     * @return Mage_Catalog_Model_Product || false
     */
    protected function _initProduct($aa) {
        $productId = (int) $this->getRequest()->getParam('product');
        $sheer_verification = Mage::getSingleton('core/session')->getSheerVerify();
        if ($productId) {
            $product = Mage::getModel('catalog/product')
                    ->setStoreId(Mage::app()->getStore()->getId())
                    ->load($productId);
            $varified = $sheer_verification;
            $check_sheer_verify_set = $product->getData('sheerid_verify');
            if ((!isset($check_sheer_verify_set) || ($check_sheer_verify_set != 0)) && (isset($varified))) {
                
            } else {
                $message = $this->__('You are not verified ');
                Mage::getSingleton('core/session')->addError($message);
                return false;
            }

            if ($product->getId()) {
                return $product;
            }
        }
        return false;
    }

}