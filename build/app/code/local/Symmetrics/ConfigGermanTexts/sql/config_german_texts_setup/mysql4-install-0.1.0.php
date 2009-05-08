<?php

$configData = Mage::getConfig()->getNode('default/config_german_texts')->asArray();
$datetime = date('Y-m-d H:i:s');

$installer = $this;
$installer->startSetup();

#############################################################################################################
# agb
#############################################################################################################

if($configData['blocks']['default']['sym_agb']['active'] == 1)
{
	$query = <<< EOF
    INSERT INTO `checkout_agreement` (`name`, `content`, `content_height`, `checkbox_text`, `is_active`, `is_html`) VALUES
    ('AGB', '{{block type="cms/block" block_id="sym_agb"}}', '', 'Hiermit werden die Allgemeinen Geschäftsbedingungen und die Widerrufsbelehrung akzeptiert.', 1, 1);
EOF;
	$installer->run($query);
	
	$new_entity_id = $installer->getConnection()->lastInsertId();
	$query = <<< EOF
    INSERT INTO `checkout_agreement_store` (`agreement_id`, `store_id`) VALUES ('$new_entity_id', '0');
EOF;
	$installer->run($query);
}

#############################################################################################################
# cms pages
#############################################################################################################

if($configData['blocks']['default']['sym_404']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `cms_page` (`title`, `root_template`, `meta_keywords`, `meta_description`, `identifier`, `content`, `creation_time`, `update_time`, `is_active`, `sort_order`, `layout_update_xml`, `custom_theme`, `custom_theme_from`, `custom_theme_to`) VALUES
	('Seite nicht gefunden', 'two_columns_right', '', '', 'not-found', '{$configData['blocks']['default']['sym_404']['text']}', '$datetime', '$datetime', 1, 0, '', '', NULL, NULL);
EOF;
	$installer->run($query);
	
	$new_entity_id = $installer->getConnection()->lastInsertId();
	$query = <<< EOF
	INSERT INTO `cms_page_store` (`page_id`, `store_id`) VALUES ('$new_entity_id', '0');
EOF;
	$installer->run($query);
}

if($configData['blocks']['default']['sym_agb']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `cms_page` (`title`, `root_template`, `meta_keywords`, `meta_description`, `identifier`, `content`, `creation_time`, `update_time`, `is_active`, `sort_order`, `layout_update_xml`, `custom_theme`, `custom_theme_from`, `custom_theme_to`) VALUES
	('AGB / Widerrufsbelehrung', 'one_column', '', '', 'agb', '{{block type="cms/block" block_id="sym_agb"}}', '$datetime', '$datetime', 1, 0, '', '', NULL, NULL);
EOF;
	$installer->run($query);
	
	$new_entity_id = $installer->getConnection()->lastInsertId();
	$query = <<< EOF
	INSERT INTO `cms_page_store` (`page_id`, `store_id`) VALUES ('$new_entity_id', '0');
EOF;
	$installer->run($query);
}

if($configData['blocks']['default']['sym_impressum']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `cms_page` (`title`, `root_template`, `meta_keywords`, `meta_description`, `identifier`, `content`, `creation_time`, `update_time`, `is_active`, `sort_order`, `layout_update_xml`, `custom_theme`, `custom_theme_from`, `custom_theme_to`) VALUES
	('Impressum', 'one_column', '', '', 'impressum', '{$configData['blocks']['default']['sym_impressum']['text']}', '$datetime', '$datetime', 1, 0, '', '', NULL, NULL);
EOF;
	$installer->run($query);
	
	$new_entity_id = $installer->getConnection()->lastInsertId();
	$query = <<< EOF
	INSERT INTO `cms_page_store` (`page_id`, `store_id`) VALUES ('$new_entity_id', '0');
EOF;
	$installer->run($query);
}

if($configData['blocks']['default']['sym_zahlung']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `cms_page` (`title`, `root_template`, `meta_keywords`, `meta_description`, `identifier`, `content`, `creation_time`, `update_time`, `is_active`, `sort_order`, `layout_update_xml`, `custom_theme`, `custom_theme_from`, `custom_theme_to`) VALUES
	('Zahlungsarten', 'one_column', '', '', 'zahlung', '{$configData['blocks']['default']['sym_zahlung']['text']}', '$datetime', '$datetime', 1, 0, '', '', NULL, NULL);
EOF;
	$installer->run($query);
	
	$new_entity_id = $installer->getConnection()->lastInsertId();
	$query = <<< EOF
	INSERT INTO `cms_page_store` (`page_id`, `store_id`) VALUES ('$new_entity_id', '0');
EOF;
	$installer->run($query);
}

if($configData['blocks']['default']['sym_datenschutz']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `cms_page` (`title`, `root_template`, `meta_keywords`, `meta_description`, `identifier`, `content`, `creation_time`, `update_time`, `is_active`, `sort_order`, `layout_update_xml`, `custom_theme`, `custom_theme_from`, `custom_theme_to`) VALUES
	('Datenschutz', 'one_column', '', '', 'datenschutz', '{$configData['blocks']['default']['sym_datenschutz']['text']}', '$datetime', '$datetime', 1, 0, '', '', NULL, NULL);
EOF;
	$installer->run($query);
	
	$new_entity_id = $installer->getConnection()->lastInsertId();
	$query = <<< EOF
	INSERT INTO `cms_page_store` (`page_id`, `store_id`) VALUES ('$new_entity_id', '0');
EOF;
	$installer->run($query);
}

if($configData['blocks']['default']['sym_lieferung']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `cms_page` (`title`, `root_template`, `meta_keywords`, `meta_description`, `identifier`, `content`, `creation_time`, `update_time`, `is_active`, `sort_order`, `layout_update_xml`, `custom_theme`, `custom_theme_from`, `custom_theme_to`) VALUES
	('Lieferung', 'one_column', '', '', 'lieferung', '{$configData['blocks']['default']['sym_lieferung']['text']}', '$datetime', '$datetime', 1, 0, '', '', NULL, NULL);
EOF;
	$installer->run($query);
	
	$new_entity_id = $installer->getConnection()->lastInsertId();
	$query = <<< EOF
	INSERT INTO `cms_page_store` (`page_id`, `store_id`) VALUES ('$new_entity_id', '0');
EOF;
	$installer->run($query);
}

if($configData['blocks']['default']['sym_bestellung']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `cms_page` (`title`, `root_template`, `meta_keywords`, `meta_description`, `identifier`, `content`, `creation_time`, `update_time`, `is_active`, `sort_order`, `layout_update_xml`, `custom_theme`, `custom_theme_from`, `custom_theme_to`) VALUES
	('Bestellvorgang', 'one_column', '', '', 'bestellung', '{$configData['blocks']['default']['sym_bestellung']['text']}', '$datetime', '$datetime', 1, 0, '', '', NULL, NULL);
EOF;
	$installer->run($query);
	
	$new_entity_id = $installer->getConnection()->lastInsertId();
	$query = <<< EOF
	INSERT INTO `cms_page_store` (`page_id`, `store_id`) VALUES ('$new_entity_id', '0');
EOF;
	$installer->run($query);
}

#############################################################################################################
# cms blocks
#############################################################################################################

if($configData['blocks']['default']['sym_footerlinks']['active'] == 1)
{
	$query = <<< EOF
	UPDATE `cms_block` SET `identifier` = 'footer_links_backup', `update_time` = '$datetime' WHERE `identifier` = 'footer_links';
EOF;
	$installer->run($query);
	
	$query = <<< EOF
	INSERT INTO `cms_block` (`title`, `content`, `creation_time`, `update_time`, `identifier`) VALUES ('{$configData['blocks']['default']['sym_footerlinks']['text']}',  '$datetime', '$datetime', 'footer_links');
EOF;
	$installer->run($query);
}

if($configData['blocks']['default']['sym_agb']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `cms_block` (`title`, `identifier`, `content`, `creation_time`, `update_time`, `is_active`) VALUES
	('AGB', 'sym_agb', '{$configData['blocks']['default']['sym_agb']['text']}', '$datetime', '$datetime', 1);
EOF;
	$installer->run($query);
	
	$new_entity_id = $installer->getConnection()->lastInsertId();
	$query = <<< EOF
	INSERT INTO `cms_block_store` (`block_id`, `store_id`) VALUES ('$new_entity_id', '0');
EOF;
	$installer->run($query);
}

if($configData['blocks']['default']['sym_widerruf']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `cms_block` (`title`, `identifier`, `content`, `creation_time`, `update_time`, `is_active`) VALUES
	('Widerrufsbelehrung', 'sym_widerruf', '{$configData['blocks']['default']['sym_widerruf']['text']}', '$datetime', '$datetime', 1);
EOF;
	$installer->run($query);
	
	$new_entity_id = $installer->getConnection()->lastInsertId();
	$query = <<< EOF
	INSERT INTO `cms_block_store` (`block_id`, `store_id`) VALUES ('$new_entity_id', '0');
EOF;
	$installer->run($query);
}

#############################################################################################################
# email templates
#############################################################################################################

if($configData['emails']['default']['new_adminpassword']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Neues Admin-Passwort (Template)', '{$configData['emails']['default']['new_adminpassword']['text']}', 2, 'Neues Passwort für {{var user.name}}', NULL, NULL, '$datetime', '$datetime');
EOF;
	$installer->run($query);
	$new_entity_id = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('admin/emails/forgot_email_template', $new_entity_id);
}

if($configData['emails']['default']['currencyupdate']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Währung Aktualisierung (Template)', '{$configData['emails']['default']['currencyupdate']['text']}', 1, 'Warnungen bei Währungsupdate', NULL, NULL, '$datetime', '$datetime');
EOF;
	$installer->run($query);
	$new_entity_id = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('currency/import/error_email_template', $new_entity_id);
}

if($configData['emails']['default']['new_account']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Neues Konto (Template)', '{$configData['emails']['default']['new_account']['text']}', 2, 'Willkommen, {{var customer.name}}!', NULL, NULL, '$datetime', '$datetime');
EOF;
	$installer->run($query);
	$new_entity_id = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('customer/create_account/email_template', $new_entity_id);
}

if($configData['emails']['default']['new_account_activate']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Neues Konto Aktivierung  (Template)', '{$configData['emails']['default']['new_account_activate']['text']}', 2, 'Bestätigung des Kundenkontos für {{var customer.name}}', NULL, NULL, '$datetime', '$datetime');
EOF;
	$installer->run($query);
	$new_entity_id = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('customer/create_account/email_confirmation_template', $new_entity_id);
}

if($configData['emails']['default']['new_account_confirmed']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Neues Konto Bestätigung (Template)', '{$configData['emails']['default']['new_account_confirmed']['text']}', 2, 'Willkommen, {{var customer.name}}!', NULL, NULL, '$datetime', '$datetime');
EOF;
	$installer->run($query);
	$new_entity_id = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('customer/create_account/email_confirmed_template', $new_entity_id);
}

if($configData['emails']['default']['new_password']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Neues Passwort (Template)', '{$configData['emails']['default']['new_password']['text']}', 2, 'Neues Passwort für {{var customer.name}}', NULL, NULL, '$datetime', '$datetime');
EOF;
	$installer->run($query);
	$new_entity_id = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('customer/password/forgot_email_template', $new_entity_id);
}

if($configData['emails']['default']['new_order']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Neue Bestellung (Template)', '{$configData['emails']['default']['new_order']['text']}', 2, '{{var order.getStoreGroupName()}}: Neue Bestellung Nr. # {{var order.increment_id}}', NULL, NULL, '$datetime', '$datetime');
EOF;
	$installer->run($query);
	$new_entity_id = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('sales_email/order/template', $new_entity_id);
}

if($configData['emails']['default']['new_order_guest']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Neue Bestellung Gast (Template)', '{$configData['emails']['default']['new_order_guest']['text']}', 2, '{{var order.getStoreGroupName()}}: Neue Bestellung Nr. # {{var order.increment_id}}', NULL, NULL, '$datetime', '$datetime');
EOF;
	$installer->run($query);
	$new_entity_id = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('sales_email/order/guest_template', $new_entity_id);
}

if($configData['emails']['default']['update_order']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Bestellung Aktualsierung (Template)', '{$configData['emails']['default']['update_order']['text']}', 2, '{{var order.getStoreGroupName()}}: Bestellung Nr. # {{var order.increment_id}} Aktualisierung', NULL, NULL, '$datetime', '$datetime');
EOF;
	$installer->run($query);
	$new_entity_id = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('sales_email/order_comment/template', $new_entity_id);
}

if($configData['emails']['default']['update_order_guest']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Bestellung Aktualsierung Gast (Template)', '{$configData['emails']['default']['update_order_guest']['text']}', 2, '{{var order.getStoreGroupName()}}: Bestellung Nr. # {{var order.increment_id}} Aktualisierung', NULL, NULL, '$datetime', '$datetime');
EOF;
	$installer->run($query);
	$new_entity_id = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('sales_email/order_comment/guest_template', $new_entity_id);
}

if($configData['emails']['default']['new_invoice']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Neue Rechnung (Template)', '{$configData['emails']['default']['new_invoice']['text']}', 2, '{{var order.getStoreGroupName()}}: Proformarechnung Nr. # {{var invoice.increment_id}} für Bestellung Nr. # {{var order.increment_id}}', NULL, NULL, '$datetime', '$datetime');
EOF;
	$installer->run($query);
	$new_entity_id = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('sales_email/invoice/template', $new_entity_id);
}

if($configData['emails']['default']['new_invoice_guest']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Neue Rechnung Gast (Template)', '{$configData['emails']['default']['new_invoice_guest']['text']}', 2, '{{var order.getStoreGroupName()}}: Proformarechnung Nr. # {{var invoice.increment_id}} für Bestellung Nr. # {{var order.increment_id}}', NULL, NULL, '$datetime', '$datetime');
EOF;
	$installer->run($query);
	$new_entity_id = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('sales_email/invoice/guest_template', $new_entity_id);
}

if($configData['emails']['default']['update_invoice']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Rechnung Aktualisierung (Template)', '{$configData['emails']['default']['update_invoice']['text']}', 2, '{{var order.getStoreGroupName()}}: Rechnung Nr. # {{var invoice.increment_id}} Aktualisierung', NULL, NULL, '$datetime', '$datetime');
EOF;
	$installer->run($query);
	$new_entity_id = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('sales_email/invoice_comment/template', $new_entity_id);
}

if($configData['emails']['default']['update_invoice_guest']['active'] == 1)
{
    $query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Rechnung Aktualisierung Gast (Template)', '{$configData['emails']['default']['update_invoice_guest']['text']}', 2, '{{var order.getStoreGroupName()}}: Rechnung Nr. # {{var invoice.increment_id}} Aktualisierung', NULL, NULL, '$datetime', '$datetime');
EOF;
	$installer->run($query);
	$new_entity_id = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('sales_email/invoice_comment/guest_template', $new_entity_id);
}

if($configData['emails']['default']['new_creditmemo']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Neue Gutschrift (Template)', '{$configData['emails']['default']['new_creditmemo']['text']}', 2, '{{var order.getStoreGroupName()}}: Gutschrift Nr. # {{var creditmemo.increment_id}} für Bestellung Nr. # {{var order.increment_id}}', NULL, NULL, '$datetime', '$datetime');
EOF;
	$installer->run($query);
	$new_entity_id = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('sales_email/creditmemo/template', $new_entity_id);
}

if($configData['emails']['default']['new_creditmemo_guest']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Neue Gutschrift Gast (Template)', '{$configData['emails']['default']['new_creditmemo_guest']['text']}', 2, '{{var order.getStoreGroupName()}}: Gutschrift Nr. # {{var creditmemo.increment_id}} für Bestellung Nr. # {{var order.increment_id}}', NULL, NULL, '$datetime', '$datetime');
EOF;
	$installer->run($query);
	$new_entity_id = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('sales_email/creditmemo/guest_template', $new_entity_id);
}

if($configData['emails']['default']['update_creditmemo']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Gutschrift Aktualisierung (Template)', '{$configData['emails']['default']['update_creditmemo']['text']}', 2, '{{var order.getStoreGroupName()}}: Gutschrift Nr. # {{var creditmemo.increment_id}} Aktualisierung', NULL, NULL, '$datetime', '$datetime');
EOF;
	$installer->run($query);
	$new_entity_id = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('sales_email/creditmemo_comment/template', $new_entity_id);
}

if($configData['emails']['default']['update_creditmemo_guest']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Gutschrift Aktualisierung Gast (Template)', '{$configData['emails']['default']['update_creditmemo_guest']['text']}', 2, '{{var order.getStoreGroupName()}}: Gutschrift Nr. # {{var creditmemo.increment_id}} Aktualisierung', NULL, NULL, '$datetime', '$datetime');
EOF;
	$installer->run($query);
	$new_entity_id = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('sales_email/creditmemo_comment/guest_template', $new_entity_id);
}

if($configData['emails']['default']['new_shipment']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Neue Lieferung (Template)', '{$configData['emails']['default']['new_shipment']['text']}', 2, '{{var order.getStoreGroupName()}}: Lieferschein Nr. # {{var shipment.increment_id}} für Bestellung Nr. # {{var order.increment_id}}', NULL, NULL, '$datetime', '$datetime');
EOF;
	$installer->run($query);
	$new_entity_id = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('sales_email/shipment/template', $new_entity_id);
}

if($configData['emails']['default']['new_shipment_guest']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Neue Lieferung Gast (Template)', '{$configData['emails']['default']['new_shipment_guest']['text']}', 2, '{{var order.getStoreGroupName()}}: Lieferschein Nr. # {{var shipment.increment_id}} für Bestellung Nr. # {{var order.increment_id}}', NULL, NULL, '$datetime', '$datetime');
EOF;
	$installer->run($query);
	$new_entity_id = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('sales_email/shipment/guest_template', $new_entity_id);
}
if($configData['emails']['default']['update_shipment']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Lieferung Aktualisierung (Template)', '{$configData['emails']['default']['update_shipment']['text']}', 2, '{{var order.getStoreGroupName()}}: Lieferschein Nr. # {{var shipment.increment_id}} Aktualisierung', NULL, NULL, '$datetime', '$datetime');
EOF;
	$installer->run($query);
	$new_entity_id = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('sales_email/shipment_comment/template', $new_entity_id);
}

if($configData['emails']['default']['update_shipment_guest']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Lieferung Aktualisierung Gast (Template)', '{$configData['emails']['default']['update_shipment_guest']['text']}', 2, '{{var order.getStoreGroupName()}}: Lieferschein Nr. # {{var shipment.increment_id}} Aktualisierung', NULL, NULL, '$datetime', '$datetime');
EOF;
	$installer->run($query);
	$new_entity_id = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('sales_email/shipment_comment/guest_template', $new_entity_id);
}

if($configData['emails']['default']['transaction_failed']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Zahlung fehlgeschlagen (Template)', '{$configData['emails']['default']['transaction_failed']['text']}', 2, 'Transaktion fehlgeschlagen', NULL, NULL, '$datetime', '$datetime');
EOF;
	$installer->run($query);
	$new_entity_id = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('checkout/payment_failed/template', $new_entity_id);
}

if($configData['emails']['default']['log_cleaning_errors']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Protokoll Bereinigung Warnungen (Template)', '{$configData['emails']['default']['log_cleaning_errors']['text']}', 1, 'Warnung bei der Protokollbereinigung', NULL, NULL, '$datetime', '$datetime');
EOF;
	$installer->run($query);
	$new_entity_id = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('system/log/error_email_template', $new_entity_id);
}

if($configData['emails']['default']['newsletter_subscription_confirm']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Newsletter Anmeldung Bestätigung (Template)', '{$configData['emails']['default']['newsletter_subscription_confirm']['text']}', 2, 'Newsletter Anmeldung Bestätigung', NULL, NULL, '$datetime', '$datetime');
EOF;
	$installer->run($query);
	$new_entity_id = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('newsletter/subscription/confirm_email_template', $new_entity_id);
}

if($configData['emails']['default']['newsletter_subscription_success']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Newsletter Anmeldung Erfolg (Template)', '{$configData['emails']['default']['newsletter_subscription_success']['text']}', 2, 'Newsletter Anmeldung erfolgreich', NULL, NULL, '$datetime', '$datetime');
EOF;
	$installer->run($query);
	$new_entity_id = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('newsletter/subscription/un_email_template', $new_entity_id);
}

if($configData['emails']['default']['newsletter_unsubscription_success']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Newsletter Abmeldung Erfolg (Template)', '{$configData['emails']['default']['newsletter_unsubscription_success']['text']}', 2, 'Newsletter Abmeldung erfolgreich', NULL, NULL, '$datetime', '$datetime');
EOF;
	$installer->run($query);
	$new_entity_id = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('newsletter/subscription/success_email_template', $new_entity_id);
}

if($configData['emails']['default']['wishlist_share']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Wunschliste gemeinsam nutzen (Template)', '{$configData['emails']['default']['wishlist_share']['text']}', 2, 'Schauen Sie sich {{var customer.name}}''s Wunschzettel an', NULL, NULL, '$datetime', '$datetime');
EOF;
	$installer->run($query);
	$new_entity_id = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('wishlist/email/email_template', $new_entity_id);
}

if($configData['emails']['default']['product_tellafriend']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Produkt an einen Freund verschicken (Template)', '{$configData['emails']['default']['product_tellafriend']['text']}', 2, 'Willkommen, {{var name}}', NULL, NULL, '$datetime', '$datetime');
EOF;
	$installer->run($query);
	$new_entity_id = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('sendfriend/email/template', $new_entity_id);
}

if($configData['emails']['default']['contact_form']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Kontaktformular (Template)', '{$configData['emails']['default']['contact_form']['text']}', 1, 'Kontaktformular', NULL, NULL, '$datetime', '$datetime');
EOF;
	$installer->run($query);
	$new_entity_id = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('contacts/email/email_template', $new_entity_id);
}

if($configData['emails']['default']['sitemap_generation_warnings']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Sitemap Generierung Warnungen (Template)', '{$configData['emails']['default']['sitemap_generation_warnings']['text']}', 1, 'Sitemap Generierung - Warnung', NULL, NULL, '$datetime', '$datetime');
EOF;
	$installer->run($query);
	$new_entity_id = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('sitemap/generate/error_email_template', $new_entity_id);
}

if($configData['emails']['default']['product_available']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Produkt wieder verfügbar (Template)', '{$configData['emails']['default']['product_available']['text']}', 2, 'Produkt wieder verfügbar', NULL, NULL, '$datetime', '$datetime');
EOF;
	$installer->run($query);
	$new_entity_id = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('catalog/productalert/email_stock_template', $new_entity_id);
}

if($configData['emails']['default']['product_priceupdate']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Produkt Preisänderung (Template)', '{$configData['emails']['default']['product_priceupdate']['text']}', 2, 'Produkt Preisänderung', NULL, NULL, '$datetime', '$datetime');
EOF;
	$installer->run($query);
	$new_entity_id = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('catalog/productalert/email_price_template', $new_entity_id);
}

if($configData['emails']['default']['product_priceupdate_cron']['active'] == 1)
{
	$query = <<< EOF
	INSERT INTO `core_email_template` (`template_code`, `template_text`, `template_type`, `template_subject`, `template_sender_name`, `template_sender_email`, `added_at`, `modified_at`) VALUES
	('Produkt Cron Fehler (Template)', '{$configData['emails']['default']['product_priceupdate_cron']['text']}', 2, 'Product alerts Cron error', NULL, NULL, '$datetime', '$datetime');
EOF;
	$installer->run($query);
	$new_entity_id = $installer->getConnection()->lastInsertId();
	$installer->setConfigData('catalog/productalert_cron/error_email_template', $new_entity_id);
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
('Mage_Catalog::Availability: In stock.', 0, 'Verfügbarkeit: sofort lieferbar', 'de_DE');
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
$installer->setConfigData('general/impressum/rechtlicheregelungen', $configData['impressum']['legal_info']);
$installer->setConfigData('sales_pdf/invoice/put_order_id', '1');
$installer->setConfigData('sales_pdf/invoice/maturity', $configData['impressum']['invoice_maturity']);
$installer->setConfigData('sales_pdf/invoice/note', $configData['impressum']['invoice_note']);
$installer->setConfigData('sales_pdf/shipment/put_order_id', '1');
$installer->setConfigData('sales_pdf/creditmemo/put_order_id', '1');
$installer->setConfigData('sales/identity/logo', 'default/logo.jpg');
$installer->setConfigData('sales_pdf/invoice/customeridprefix', $configData['impressum']['invoice_customer_prefix']);
$installer->setConfigData('tax/display/shippingurl', 'lieferung');

$installer->endSetup();