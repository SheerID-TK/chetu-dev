<?php
class SheerID_Verify_Model_Admin_Config_Observer {
	public function on_config_change() {
/*	$postdata = Mage::app()->getRequest()->getParams();
	Mage::log(print_r($postdata['groups']['settings']['fields'],true),null,"log.php");
	
	
	die("here");*/
		$helper = Mage::helper('sheerid_verify');

		$enabled = $helper->allowSendEmail();
		try {
			$notifier = $helper->getEmailNotifier();
			if ($enabled && !$notifier) {
				$helper->addEmailNotifier();
				// ensure notifier exists
			} else if (!$enabled && $notifier) {
				$helper->removeEmailNotifier();
			}
		} catch (Exception $e) {
			$msg = $enabled ? 'Unable to enable email notifications.' : 'Unable to disable email notifications.';
			Mage::throwException(Mage::helper('adminhtml')->__($msg));
		}

	}
}
