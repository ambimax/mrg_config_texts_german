<?php

$configData = Mage::getConfig()->getNode('default/config_german_texts')->asArray();
$dateTime = date('Y-m-d H:i:s');

$installer = $this;
$installer->startSetup();

$footerLinks = array('sym_agb', 'sym_widerruf', 'sym_bestellung', 'sym_datenschutz', 'sym_zahlung', 'sym_lieferung', 'sym_impressum');

#############################################################################################################
# cms pages
#############################################################################################################

$externalContent = file_get_contents($configData['blocks']['default']['sym_404']['text']);

if ($configData['blocks']['default']['sym_404']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `cms_page` (`title`, `root_template`, `meta_keywords`, `meta_description`, `identifier`, `content`, `creation_time`, `update_time`, `is_active`, `sort_order`, `layout_update_xml`, `custom_theme`, `custom_theme_from`, `custom_theme_to`) VALUES
	('Seite nicht gefunden', 'two_columns_right', '', '', 'not-found', '{$externalContent}', '$dateTime', '$dateTime', 1, 0, '', '', NULL, NULL);
EOF;
	$installer->run($query);
	
	$newEntityId = $installer->getConnection()->lastInsertId();
	$query = <<< EOF
	INSERT INTO `cms_page_store` (`page_id`, `store_id`) VALUES ('$newEntityId', '0');
EOF;
	$installer->run($query);
}

$externalContent = file_get_contents($configData['blocks']['default']['sym_impressum']['text']);

if ($configData['blocks']['default']['sym_impressum']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `cms_page` (`title`, `root_template`, `meta_keywords`, `meta_description`, `identifier`, `content`, `creation_time`, `update_time`, `is_active`, `sort_order`, `layout_update_xml`, `custom_theme`, `custom_theme_from`, `custom_theme_to`) VALUES
	('Impressum', 'one_column', '', '', 'impressum', '{$externalContent}', '$dateTime', '$dateTime', 1, 0, '', '', NULL, NULL);
EOF;
	$installer->run($query);
	
	$newEntityId = $installer->getConnection()->lastInsertId();
	$query = <<< EOF
	INSERT INTO `cms_page_store` (`page_id`, `store_id`) VALUES ('$newEntityId', '0');
EOF;
	$installer->run($query);
}

$externalContent = file_get_contents($configData['blocks']['default']['sym_zahlung']['text']);

if ($configData['blocks']['default']['sym_zahlung']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `cms_page` (`title`, `root_template`, `meta_keywords`, `meta_description`, `identifier`, `content`, `creation_time`, `update_time`, `is_active`, `sort_order`, `layout_update_xml`, `custom_theme`, `custom_theme_from`, `custom_theme_to`) VALUES
	('Zahlungsarten', 'one_column', '', '', 'zahlung', '{$externalContent}', '$dateTime', '$dateTime', 1, 0, '', '', NULL, NULL);
EOF;
	$installer->run($query);
	
	$newEntityId = $installer->getConnection()->lastInsertId();
	$query = <<< EOF
	INSERT INTO `cms_page_store` (`page_id`, `store_id`) VALUES ('$newEntityId', '0');
EOF;
	$installer->run($query);
}

$externalContent = file_get_contents($configData['blocks']['default']['sym_datenschutz']['text']);

if ($configData['blocks']['default']['sym_datenschutz']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `cms_page` (`title`, `root_template`, `meta_keywords`, `meta_description`, `identifier`, `content`, `creation_time`, `update_time`, `is_active`, `sort_order`, `layout_update_xml`, `custom_theme`, `custom_theme_from`, `custom_theme_to`) VALUES
	('Datenschutz', 'one_column', '', '', 'datenschutz', '{$externalContent}', '$dateTime', '$dateTime', 1, 0, '', '', NULL, NULL);
EOF;
	$installer->run($query);
	
	$newEntityId = $installer->getConnection()->lastInsertId();
	$query = <<< EOF
	INSERT INTO `cms_page_store` (`page_id`, `store_id`) VALUES ('$newEntityId', '0');
EOF;
	$installer->run($query);
}

$externalContent = file_get_contents($configData['blocks']['default']['sym_lieferung']['text']);

if ($configData['blocks']['default']['sym_lieferung']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `cms_page` (`title`, `root_template`, `meta_keywords`, `meta_description`, `identifier`, `content`, `creation_time`, `update_time`, `is_active`, `sort_order`, `layout_update_xml`, `custom_theme`, `custom_theme_from`, `custom_theme_to`) VALUES
	('Lieferung', 'one_column', '', '', 'lieferung', '{$externalContent}', '$dateTime', '$dateTime', 1, 0, '', '', NULL, NULL);
EOF;
	$installer->run($query);
	
	$newEntityId = $installer->getConnection()->lastInsertId();
	$query = <<< EOF
	INSERT INTO `cms_page_store` (`page_id`, `store_id`) VALUES ('$newEntityId', '0');
EOF;
	$installer->run($query);
}

$externalContent = file_get_contents($configData['blocks']['default']['sym_bestellung']['text']);

if ($configData['blocks']['default']['sym_bestellung']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `cms_page` (`title`, `root_template`, `meta_keywords`, `meta_description`, `identifier`, `content`, `creation_time`, `update_time`, `is_active`, `sort_order`, `layout_update_xml`, `custom_theme`, `custom_theme_from`, `custom_theme_to`) VALUES
	('Bestellvorgang', 'one_column', '', '', 'bestellung', '{$externalContent}', '$dateTime', '$dateTime', 1, 0, '', '', NULL, NULL);
EOF;
	$installer->run($query);
	
	$newEntityId = $installer->getConnection()->lastInsertId();
	$query = <<< EOF
	INSERT INTO `cms_page_store` (`page_id`, `store_id`) VALUES ('$newEntityId', '0');
EOF;
	$installer->run($query);
}

#############################################################################################################
# cms blocks
#############################################################################################################

if ($configData['blocks']['default']['sym_footerlinks']['active'] == 1)
{
	$query = <<< EOF
	UPDATE `cms_block` SET `identifier` = 'footer_links_backup', `update_time` = '$dateTime' WHERE `identifier` = 'footer_links';
EOF;
	$installer->run($query);
	
	$footerLinksHTML = '<ul>';
	$footerLinksCounter = 0;
	foreach($footerLinks as $link)
	{
        $footerLinksCounter++;
		if($configData['blocks']['default'][$link]['active'] == 1)
		{
			$footerLinksHTML .= '<li class="'.(($footerLinksCounter == count($footerLinks)) ? 'last' : '').'"><a href="{{store url="'.$configData['blocks']['default'][$link]['footerlink']['default']['link'].'"}}">'.$configData['blocks']['default'][$link]['footerlink']['default']['title'].'</a></li>';
		}
	}
	$footerLinksHTML .= '</ul>';
	
	$query = <<< EOF
	INSERT INTO `cms_block` (`title`, `content`, `creation_time`, `update_time`, `identifier`) VALUES 
	('Footer Links (sym)', '$footerLinksHTML',  '$dateTime', '$dateTime', 'footer_links');
EOF;
	$installer->run($query);
	
    $newEntityId = $installer->getConnection()->lastInsertId();
    $query = <<< EOF
    INSERT INTO `cms_block_store` (`block_id`, `store_id`) VALUES ('$newEntityId', '0');
EOF;
    $installer->run($query);
}

$externalContent = file_get_contents($configData['blocks']['default']['sym_agb']['text']);

if ($configData['blocks']['default']['sym_agb']['active'] == 1)
{
    $agbBlock = $installer->getConnection()->fetchRow("
        SELECT COUNT(block_id) AS counter FROM {$installer->getTable('cms_block')} WHERE identifier='sym_agb'
    ");
    
    if($agbBlock['counter'] == 0)
    {
        $query = <<< EOF
        INSERT INTO `cms_block` (`title`, `identifier`, `content`, `creation_time`, `update_time`, `is_active`) VALUES
        ('AGB', 'sym_agb', '{$externalContent}', '$dateTime', '$dateTime', 1);
EOF;
        $installer->run($query);
    
        $newEntityId = $installer->getConnection()->lastInsertId();
        $query = <<< EOF
        INSERT INTO `cms_block_store` (`block_id`, `store_id`) VALUES ('$newEntityId', '0');
EOF;
        $installer->run($query);
    }
    else
    {
        $query = <<< EOF
        UPDATE 
                `cms_block` 
        SET 
                `content` = '{$externalContent}', 
                `update_time` = '$dateTime', 
                `is_active` = '1' 
        WHERE 
                `identifier` = 'sym_agb';
EOF;
        $installer->run($query);    	
    }
}

$externalContent = file_get_contents($configData['blocks']['default']['sym_widerruf']['text']);

if ($configData['blocks']['default']['sym_widerruf']['active'] == 1)
{
    $widerrufBlock = $installer->getConnection()->fetchRow("
        SELECT COUNT(block_id) AS counter FROM {$installer->getTable('cms_block')} WHERE identifier='sym_widerruf'
    ");
    
    if($widerrufBlock['counter'] == 0)
    {
        $query = <<< EOF
        INSERT INTO `cms_block` (`title`, `identifier`, `content`, `creation_time`, `update_time`, `is_active`) VALUES
        ('Widerrufsbelehrung', 'sym_widerruf', '{$externalContent}', '$dateTime', '$dateTime', 1);
EOF;
        $installer->run($query);
        
        $newEntityId = $installer->getConnection()->lastInsertId();
        $query = <<< EOF
        INSERT INTO `cms_block_store` (`block_id`, `store_id`) VALUES ('$newEntityId', '0');
EOF;
        $installer->run($query);
    }
    else
    {
        $query = <<< EOF
        UPDATE 
                `cms_block` 
        SET 
                `content` = '{$externalContent}', 
                `update_time` = '$dateTime', 
                `is_active` = '1' 
        WHERE 
                `identifier` = 'sym_widerruf';
EOF;
        $installer->run($query);        
    }
}

#############################################################################################################
# email templates
#############################################################################################################

$externalContent = file_get_contents($configData['emails']['default']['admin_password_new']['text']);

if ($configData['emails']['default']['admin_password_new']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Neues Admin-Passwort (Template)', '{$externalContent}', 2, 'Neues Passwort für {{var user.name}}', NULL, NULL, '$dateTime', '$dateTime');
EOF;
	$installer->run($query);
	$newEntityId = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('admin/emails/forgot_email_template', $newEntityId);
}

$externalContent = file_get_contents($configData['emails']['default']['currency_update_warning']['text']);

if ($configData['emails']['default']['currency_update_warning']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Währung Aktualisierung (Template)', '{$externalContent}', 1, 'Warnungen bei Währungsupdate', NULL, NULL, '$dateTime', '$dateTime');
EOF;
	$installer->run($query);
	$newEntityId = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('currency/import/error_email_template', $newEntityId);
}

$externalContent = file_get_contents($configData['emails']['default']['account_new']['text']);

if ($configData['emails']['default']['account_new']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Neues Konto (Template)', '{$externalContent}', 2, 'Willkommen, {{var customer.name}}!', NULL, NULL, '$dateTime', '$dateTime');
EOF;
	$installer->run($query);
	$newEntityId = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('customer/create_account/email_template', $newEntityId);
}

$externalContent = file_get_contents($configData['emails']['default']['account_new_confirmation']['text']);

if ($configData['emails']['default']['account_new_confirmation']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Neues Konto Aktivierung  (Template)', '$externalContent}', 2, 'Bestätigung des Kundenkontos für {{var customer.name}}', NULL, NULL, '$dateTime', '$dateTime');
EOF;
	$installer->run($query);
	$newEntityId = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('customer/create_account/email_confirmation_template', $newEntityId);
}

$externalContent = file_get_contents($configData['emails']['default']['account_new_confirmed']['text']);

if ($configData['emails']['default']['account_new_confirmed']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Neues Konto Bestätigung (Template)', '{$externalContent}', 2, 'Willkommen, {{var customer.name}}!', NULL, NULL, '$dateTime', '$dateTime');
EOF;
	$installer->run($query);
	$newEntityId = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('customer/create_account/email_confirmed_template', $newEntityId);
}

$externalContent = file_get_contents($configData['emails']['default']['password_new']['text']);

if ($configData['emails']['default']['password_new']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Neues Passwort (Template)', '{$externalContent}', 2, 'Neues Passwort für {{var customer.name}}', NULL, NULL, '$dateTime', '$dateTime');
EOF;
	$installer->run($query);
	$newEntityId = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('customer/password/forgot_email_template', $newEntityId);
}

$externalContent = file_get_contents($configData['emails']['default']['order_new']['text']);

if ($configData['emails']['default']['order_new']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Neue Bestellung (Template)', '{$externalContent}', 2, '{{var order.getStoreGroupName()}}: Neue Bestellung Nr. # {{var order.increment_id}}', NULL, NULL, '$dateTime', '$dateTime');
EOF;
	$installer->run($query);
	$newEntityId = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('sales_email/order/template', $newEntityId);
}

$externalContent = file_get_contents($configData['emails']['default']['order_new_guest']['text']);

if ($configData['emails']['default']['order_new_guest']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Neue Bestellung Gast (Template)', '{$externalContent}', 2, '{{var order.getStoreGroupName()}}: Neue Bestellung Nr. # {{var order.increment_id}}', NULL, NULL, '$dateTime', '$dateTime');
EOF;
	$installer->run($query);
	$newEntityId = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('sales_email/order/guest_template', $newEntityId);
}

$externalContent = file_get_contents($configData['emails']['default']['order_update']['text']);

if ($configData['emails']['default']['order_update']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Bestellung Aktualsierung (Template)', '{$externalContent}', 2, '{{var order.getStoreGroupName()}}: Bestellung Nr. # {{var order.increment_id}} Aktualisierung', NULL, NULL, '$dateTime', '$dateTime');
EOF;
	$installer->run($query);
	$newEntityId = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('sales_email/order_comment/template', $newEntityId);
}

$externalContent = file_get_contents($configData['emails']['default']['order_update_guest']['text']);

if ($configData['emails']['default']['order_update_guest']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Bestellung Aktualsierung Gast (Template)', '{$externalContent}', 2, '{{var order.getStoreGroupName()}}: Bestellung Nr. # {{var order.increment_id}} Aktualisierung', NULL, NULL, '$dateTime', '$dateTime');
EOF;
	$installer->run($query);
	$newEntityId = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('sales_email/order_comment/guest_template', $newEntityId);
}

$externalContent = file_get_contents($configData['emails']['default']['invoice_new']['text']);

if ($configData['emails']['default']['invoice_new']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Neue Rechnung (Template)', '{$externalContent}', 2, '{{var order.getStoreGroupName()}}: Proformarechnung Nr. # {{var invoice.increment_id}} für Bestellung Nr. # {{var order.increment_id}}', NULL, NULL, '$dateTime', '$dateTime');
EOF;
	$installer->run($query);
	$newEntityId = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('sales_email/invoice/template', $newEntityId);
}

$externalContent = file_get_contents($configData['emails']['default']['invoice_new_guest']['text']);

if ($configData['emails']['default']['invoice_new_guest']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Neue Rechnung Gast (Template)', '{$externalContent}', 2, '{{var order.getStoreGroupName()}}: Proformarechnung Nr. # {{var invoice.increment_id}} für Bestellung Nr. # {{var order.increment_id}}', NULL, NULL, '$dateTime', '$dateTime');
EOF;
	$installer->run($query);
	$newEntityId = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('sales_email/invoice/guest_template', $newEntityId);
}

$externalContent = file_get_contents($configData['emails']['default']['invoice_update']['text']);

if ($configData['emails']['default']['invoice_update']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Rechnung Aktualisierung (Template)', '{$externalContent}', 2, '{{var order.getStoreGroupName()}}: Rechnung Nr. # {{var invoice.increment_id}} Aktualisierung', NULL, NULL, '$dateTime', '$dateTime');
EOF;
	$installer->run($query);
	$newEntityId = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('sales_email/invoice_comment/template', $newEntityId);
}

$externalContent = file_get_contents($configData['emails']['default']['invoice_update_guest']['text']);

if ($configData['emails']['default']['invoice_update_guest']['active'] == 1)
{
    $query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Rechnung Aktualisierung Gast (Template)', '{$externalContent}', 2, '{{var order.getStoreGroupName()}}: Rechnung Nr. # {{var invoice.increment_id}} Aktualisierung', NULL, NULL, '$dateTime', '$dateTime');
EOF;
	$installer->run($query);
	$newEntityId = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('sales_email/invoice_comment/guest_template', $newEntityId);
}

$externalContent = file_get_contents($configData['emails']['default']['creditmemo_new']['text']);

if ($configData['emails']['default']['creditmemo_new']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Neue Gutschrift (Template)', '{$externalContent}', 2, '{{var order.getStoreGroupName()}}: Gutschrift Nr. # {{var creditmemo.increment_id}} für Bestellung Nr. # {{var order.increment_id}}', NULL, NULL, '$dateTime', '$dateTime');
EOF;
	$installer->run($query);
	$newEntityId = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('sales_email/creditmemo/template', $newEntityId);
}

$externalContent = file_get_contents($configData['emails']['default']['creditmemo_new_guest']['text']);

if ($configData['emails']['default']['creditmemo_new_guest']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Neue Gutschrift Gast (Template)', '{$externalContent}', 2, '{{var order.getStoreGroupName()}}: Gutschrift Nr. # {{var creditmemo.increment_id}} für Bestellung Nr. # {{var order.increment_id}}', NULL, NULL, '$dateTime', '$dateTime');
EOF;
	$installer->run($query);
	$newEntityId = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('sales_email/creditmemo/guest_template', $newEntityId);
}

$externalContent = file_get_contents($configData['emails']['default']['creditmemo_update']['text']);

if ($configData['emails']['default']['creditmemo_update']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Gutschrift Aktualisierung (Template)', '{$externalContent}', 2, '{{var order.getStoreGroupName()}}: Gutschrift Nr. # {{var creditmemo.increment_id}} Aktualisierung', NULL, NULL, '$dateTime', '$dateTime');
EOF;
	$installer->run($query);
	$newEntityId = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('sales_email/creditmemo_comment/template', $newEntityId);
}

$externalContent = file_get_contents($configData['emails']['default']['creditmemo_update_guest']['text']);

if ($configData['emails']['default']['creditmemo_update_guest']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Gutschrift Aktualisierung Gast (Template)', '{$externalContent}', 2, '{{var order.getStoreGroupName()}}: Gutschrift Nr. # {{var creditmemo.increment_id}} Aktualisierung', NULL, NULL, '$dateTime', '$dateTime');
EOF;
	$installer->run($query);
	$newEntityId = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('sales_email/creditmemo_comment/guest_template', $newEntityId);
}

$externalContent = file_get_contents($configData['emails']['default']['shipment_new']['text']);

if ($configData['emails']['default']['shipment_new']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Neue Lieferung (Template)', '{$externalContent}', 2, '{{var order.getStoreGroupName()}}: Lieferschein Nr. # {{var shipment.increment_id}} für Bestellung Nr. # {{var order.increment_id}}', NULL, NULL, '$dateTime', '$dateTime');
EOF;
	$installer->run($query);
	$newEntityId = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('sales_email/shipment/template', $newEntityId);
}

$externalContent = file_get_contents($configData['emails']['default']['shipment_new_guest']['text']);

if ($configData['emails']['default']['shipment_new_guest']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Neue Lieferung Gast (Template)', '{$externalContent}', 2, '{{var order.getStoreGroupName()}}: Lieferschein Nr. # {{var shipment.increment_id}} für Bestellung Nr. # {{var order.increment_id}}', NULL, NULL, '$dateTime', '$dateTime');
EOF;
	$installer->run($query);
	$newEntityId = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('sales_email/shipment/guest_template', $newEntityId);
}

$externalContent = file_get_contents($configData['emails']['default']['shipment_update']['text']);

if ($configData['emails']['default']['shipment_update']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Lieferung Aktualisierung (Template)', '{$externalContent}', 2, '{{var order.getStoreGroupName()}}: Lieferschein Nr. # {{var shipment.increment_id}} Aktualisierung', NULL, NULL, '$dateTime', '$dateTime');
EOF;
	$installer->run($query);
	$newEntityId = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('sales_email/shipment_comment/template', $newEntityId);
}

$externalContent = file_get_contents($configData['emails']['default']['shipment_update_guest']['text']);

if ($configData['emails']['default']['shipment_update_guest']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Lieferung Aktualisierung Gast (Template)', '{$externalContent}', 2, '{{var order.getStoreGroupName()}}: Lieferschein Nr. # {{var shipment.increment_id}} Aktualisierung', NULL, NULL, '$dateTime', '$dateTime');
EOF;
	$installer->run($query);
	$newEntityId = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('sales_email/shipment_comment/guest_template', $newEntityId);
}

$externalContent = file_get_contents($configData['emails']['default']['payment_failed']['text']);

if ($configData['emails']['default']['payment_failed']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Zahlung fehlgeschlagen (Template)', '{$externalContent}', 2, 'Transaktion fehlgeschlagen', NULL, NULL, '$dateTime', '$dateTime');
EOF;
	$installer->run($query);
	$newEntityId = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('checkout/payment_failed/template', $newEntityId);
}

$externalContent = file_get_contents($configData['emails']['default']['log_clean_warning']['text']);

if ($configData['emails']['default']['log_clean_warning']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Protokoll Bereinigung Warnungen (Template)', '{$externalContent}', 1, 'Warnung bei der Protokollbereinigung', NULL, NULL, '$dateTime', '$dateTime');
EOF;
	$installer->run($query);
	$newEntityId = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('system/log/error_email_template', $newEntityId);
}

$externalContent = file_get_contents($configData['emails']['default']['newsletter_subscr_confirm']['text']);

if ($configData['emails']['default']['newsletter_subscr_confirm']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Newsletter Anmeldung Bestätigung (Template)', '{$externalContent}', 2, 'Newsletter Anmeldung Bestätigung', NULL, NULL, '$dateTime', '$dateTime');
EOF;
	$installer->run($query);
	$newEntityId = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('newsletter/subscription/confirm_email_template', $newEntityId);
}

$externalContent = file_get_contents($configData['emails']['default']['newsletter_subscr_success']['text']);

if ($configData['emails']['default']['newsletter_subscr_success']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Newsletter Anmeldung Erfolg (Template)', '{$externalContent}', 2, 'Newsletter Anmeldung erfolgreich', NULL, NULL, '$dateTime', '$dateTime');
EOF;
	$installer->run($query);
	$newEntityId = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('newsletter/subscription/un_email_template', $newEntityId);
}

$externalContent = file_get_contents($configData['emails']['default']['newsletter_unsub_success']['text']);

if ($configData['emails']['default']['newsletter_unsub_success']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Newsletter Abmeldung Erfolg (Template)', '{$externalContent}', 2, 'Newsletter Abmeldung erfolgreich', NULL, NULL, '$dateTime', '$dateTime');
EOF;
	$installer->run($query);
	$newEntityId = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('newsletter/subscription/success_email_template', $newEntityId);
}

$externalContent = file_get_contents($configData['emails']['default']['wishlist_share']['text']);

if ($configData['emails']['default']['wishlist_share']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Wunschliste gemeinsam nutzen (Template)', '{$externalContent}', 2, 'Schauen Sie sich {{var customer.name}}''s Wunschzettel an', NULL, NULL, '$dateTime', '$dateTime');
EOF;
	$installer->run($query);
	$newEntityId = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('wishlist/email/email_template', $newEntityId);
}

$externalContent = file_get_contents($configData['emails']['default']['product_share']['text']);

if ($configData['emails']['default']['product_share']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Produkt an einen Freund verschicken (Template)', '{$externalContent}', 2, 'Willkommen, {{var name}}', NULL, NULL, '$dateTime', '$dateTime');
EOF;
	$installer->run($query);
	$newEntityId = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('sendfriend/email/template', $newEntityId);
}

$externalContent = file_get_contents($configData['emails']['default']['contact_form']['text']);

if ($configData['emails']['default']['contact_form']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Kontaktformular (Template)', '{$externalContent}', 1, 'Kontaktformular', NULL, NULL, '$dateTime', '$dateTime');
EOF;
	$installer->run($query);
	$newEntityId = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('contacts/email/email_template', $newEntityId);
}

$externalContent = file_get_contents($configData['emails']['default']['sitemap_generate_warning']['text']);

if ($configData['emails']['default']['sitemap_generate_warning']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Sitemap Generierung Warnungen (Template)', '{$externalContent}', 1, 'Sitemap Generierung - Warnung', NULL, NULL, '$dateTime', '$dateTime');
EOF;
	$installer->run($query);
	$newEntityId = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('sitemap/generate/error_email_template', $newEntityId);
}

$externalContent = file_get_contents($configData['emails']['default']['product_stock_alert']['text']);

if ($configData['emails']['default']['product_stock_alert']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Produkt wieder verfügbar (Template)', '{$externalContent}', 2, 'Produkt wieder verfügbar', NULL, NULL, '$dateTime', '$dateTime');
EOF;
	$installer->run($query);
	$newEntityId = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('catalog/productalert/email_stock_template', $newEntityId);
}

$externalContent = file_get_contents($configData['emails']['default']['product_price_alert']['text']);

if ($configData['emails']['default']['product_price_alert']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Produkt Preisänderung (Template)', '{$externalContent}', 2, 'Produkt Preisänderung', NULL, NULL, '$dateTime', '$dateTime');
EOF;
	$installer->run($query);
	$newEntityId = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('catalog/productalert/email_price_template', $newEntityId);
}

$externalContent = file_get_contents($configData['emails']['default']['product_alert_cron_error']['text']);

if ($configData['emails']['default']['product_alert_cron_error']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Produkt Cron Fehler (Template)', '{$externalContent}', 2, 'Product alerts Cron error', NULL, NULL, '$dateTime', '$dateTime');
EOF;
	$installer->run($query);
	$newEntityId = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('catalog/productalert_cron/error_email_template', $newEntityId);
}

#############################################################################################################
# translations
#############################################################################################################

$query = <<< EOF
INSERT INTO `core_translate` (`string`, `store_id`, `translate`, `locale`) VALUES
('Mage_Sales::Logo for PDF print-outs (200x50)', 0, 'Logo for PDF print-outs', 'de_DE'),
('Mage_Checkout::You will receive an order confirmation email with details of your order and a link to track its progress.', 0, 'Wenn Sie aktuell eingeloggt sind und einen Kunden Account in unserem Shop haben, dann klicken Sie hier, um eine Kopie Ihrer Bestellbestätigung zu drucken:', 'de_DE'),
('Mage_Checkout::Click <a href=""%s"" onclick=""this.target=''_blank''"">here to print</a> a copy of your order confirmation.', 0, '<a href=""%s"" onclick=""this.target=''_blank''"">Bestellbestätigung drucken</a>', 'de_DE'),
('Mage_Checkout::Your order # is: <a href=""%s"">%s</a>', 0, 'Ihre Auftragsnummer lautet: <a href=""%s"">%s</a>', 'de_DE'),
('Mage_Newsletter::Sign up for our newsletter:', 0, 'Abonnieren Sie unseren Newsletter (Abmeldung jederzeit möglich):', 'de_DE'),
('Mage_Customer::Sign Up for Newsletter', 0, 'In den Newsletter eintragen (Abmeldung jederzeit möglich)', 'de_DE'),
('Mage_Catalog::Availability: In stock.', 0, 'Verfügbarkeit: sofort lieferbar', 'de_DE'),
('Mage_Sales::Tax', 0, 'Zzgl. MwSt.', 'de_DE'),
('Mage_Sales::Subtotal', 0, 'Zwischensumme (Netto)', 'de_DE');
EOF;
$installer->run($query);

#############################################################################################################
# example texts for impressum
#############################################################################################################

$installer->setConfigData('general/impressum/company1', $configData['impressum']['company_name']);
$installer->setConfigData('general/impressum/company2', '');
$installer->setConfigData('general/impressum/street', $configData['impressum']['street']);
$installer->setConfigData('general/impressum/zip', $configData['impressum']['zip']);
$installer->setConfigData('general/impressum/city', $configData['impressum']['city']);
$installer->setConfigData('general/impressum/telephone', $configData['impressum']['phone']);
$installer->setConfigData('general/impressum/email', $configData['impressum']['email']);
$installer->setConfigData('general/impressum/fax', $configData['impressum']['fax']);
$installer->setConfigData('general/impressum/web', $configData['impressum']['homepage']);
$installer->setConfigData('general/impressum/taxnumber', $configData['impressum']['tax_number']);
$installer->setConfigData('general/impressum/vatid', $configData['impressum']['sales_tax_id_number']);
$installer->setConfigData('general/impressum/court', $configData['impressum']['commercial_register']);
$installer->setConfigData('general/impressum/taxoffice', $configData['impressum']['tax_office']);
$installer->setConfigData('general/impressum/ceo', $configData['impressum']['holder_names']);
$installer->setConfigData('general/impressum/hrb', $configData['impressum']['hrb']);
$installer->setConfigData('general/impressum/bankaccount', $configData['impressum']['bank_account']);
$installer->setConfigData('general/impressum/bankcodenumber', $configData['impressum']['bank_id_code']);
$installer->setConfigData('general/impressum/bankaccountowner', $configData['impressum']['bank_account_owner']);
$installer->setConfigData('general/impressum/bankname', $configData['impressum']['bank_name']);
$installer->setConfigData('general/impressum/swift', $configData['impressum']['bank_swift']);
$installer->setConfigData('general/impressum/iban', $configData['impressum']['bank_iban']);
$installer->setConfigData('general/impressum/shopname', $configData['impressum']['shop_name']);

$externalContent = file_get_contents($configData['impressum']['legal_info']);
$installer->setConfigData('general/impressum/rechtlicheregelungen', $externalContent);

$installer->setConfigData('sales_pdf/invoice/put_order_id', '1');
$installer->setConfigData('sales_pdf/invoice/maturity', $configData['impressum']['invoice_maturity']);
$installer->setConfigData('sales_pdf/invoice/note', $configData['impressum']['invoice_note']);
$installer->setConfigData('sales_pdf/shipment/put_order_id', '1');
$installer->setConfigData('sales_pdf/creditmemo/put_order_id', '1');
$installer->setConfigData('sales/identity/logo', 'default/logo.jpg');
$installer->setConfigData('sales_pdf/invoice/customeridprefix', $configData['impressum']['invoice_customer_prefix']);
$installer->setConfigData('tax/display/shippingurl', 'lieferung');

$installer->endSetup();