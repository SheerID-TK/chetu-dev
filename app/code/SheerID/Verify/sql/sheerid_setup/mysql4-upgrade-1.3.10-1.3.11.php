<?php

$installer = $this;
$setup = new Mage_Eav_Model_Entity_Setup('core_setup');
$installer->startSetup();

$setup->addAttribute('catalog_product', 'sheerid_verify', 
	array('group' => 'General',
		'backend' => 'catalog/product_attribute_backend_boolean',
		'frontend' => '',
		'input' => 'select',
		'label' => 'Sheerid affiliation Verification',
		'class' => '',
		'source' => 'eav/entity_attribute_source_boolean',
		'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
		'visible' => true,
		'required' => false,
		'user_defined' => true,
		'default' => 0,
		'apply_to' => '',
		'is_configurable' => 0,
		'used_in_product_listing' => 1
		'is_used_for_promo_rules' =>1
	)
);

$installer->endSetup();
