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
 * @category  Symmetrics
 * @package   Symmetrics_ConfigGermanTexts
 * @author    symmetrics gmbh <info@symmetrics.de>
 * @author    Eric Reiche <er@symmetrics.de>
 * @author    Eugen Gitin <eg@symmetrics.de>
 * @author    Sergej Braznikov <sb@symmetrics.de>
 * @copyright 2010 symmetrics gmbh
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @link      http://www.symmetrics.de/
 */

$installer = $this;
$installer->startSetup();

// execute pages
foreach ($this->getConfigPages() as $name => $data) {
    if ($data['execute'] == 1) {
        $this->createCmsPage($data);
    }
}

// execute blocks
foreach ($this->getConfigBlocks() as $name => $data) {
    if ($data['execute'] == 1) {
        if ($name == 'symmetrics_footerlinks') {
            $this->updateFooterLinksBlock($data);
        } else {
            $this->createCmsBlock($data);
        }
    }
}

// execute emails
foreach ($this->getConfigEmails() as $name => $data) {
    if ($data['execute'] == 1) {
        $this->createEmail($data);
    }
}

// // set some translations
// $query = <<< EOF
//     INSERT INTO {$this->getTable('core_translate')} (`string`, `store_id`, `translate`, `locale`) VALUES
//     ('Mage_Sales::Logo for PDF print-outs (200x50)', 0, 'Logo for PDF print-outs', 'de_DE'),
//     ('Mage_Checkout::You will receive an order confirmation email with details of your order and a link to track its progress.', 0, 'Sie erhalten in kürze eine Bestellbestätigung per Email. Wenn Sie aktuell eingeloggt sind und einen Kunden Account in unserem Shop haben, dann klicken Sie unten auf den Link, um eine Kopie Ihrer Bestellbestätigung zu drucken.', 'de_DE'),
//     ('Mage_Checkout::Click <a href=""%s"" onclick=""this.target=''_blank''"">here to print</a> a copy of your order confirmation.', 0, '<a href=""%s"" onclick=""this.target=''_blank''"">Bestellbestätigung drucken</a>', 'de_DE'),
//     ('Mage_Checkout::Your order # is: <a href=""%s"">%s</a>', 0, 'Ihre Auftragsnummer lautet: <a href=""%s"">%s</a>', 'de_DE'),
//     ('Mage_Newsletter::Sign up for our newsletter:', 0, 'Abonnieren Sie unseren Newsletter (Abmeldung jederzeit möglich):', 'de_DE'),
//     ('Mage_Customer::Sign Up for Newsletter', 0, 'In den Newsletter eintragen (Abmeldung jederzeit möglich)', 'de_DE'),
//     ('Mage_Catalog::Availability: In stock.', 0, 'Verfügbarkeit: sofort lieferbar', 'de_DE'),
//     ('Mage_Sales::Tax', 0, 'Zzgl. MwSt.', 'de_DE'),
//     ('Mage_Checkout::Please agree to all Terms and Conditions before placing the order.', 0, 'Bitte bestätigen Sie die AGB und ggf. die Widerrufsbelehrung.', 'de_DE'),
//     ('Mage_Checkout::Please agree to all Terms and Conditions before placing the orders.', 0, 'Bitte bestätigen Sie die AGB und ggf. die Widerrufsbelehrung.', 'de_DE');
// EOF;
// 
// $installer->run($query);

$prefixNew = 'general/imprint/';

// set imprint data
$imprintFields = $this->getConfigImprint();
$installer->setConfigData($prefixNew . 'shop_name', $imprintFields['shop_name']);
$installer->setConfigData($prefixNew . 'company_first', $imprintFields['company_name']);
$installer->setConfigData($prefixNew . 'company_second', $imprintFields['company_sub']);
$installer->setConfigData($prefixNew . 'street', $imprintFields['street']);
$installer->setConfigData($prefixNew . 'zip', $imprintFields['zip']);
$installer->setConfigData($prefixNew . 'city', $imprintFields['city']);
$installer->setConfigData($prefixNew . 'telephone', $imprintFields['phone']);
$installer->setConfigData($prefixNew . 'fax', $imprintFields['fax']);
$installer->setConfigData($prefixNew . 'email', $imprintFields['email']);
$installer->setConfigData($prefixNew . 'web', $imprintFields['homepage']);
$installer->setConfigData($prefixNew . 'tax_number', $imprintFields['tax_number']);
$installer->setConfigData($prefixNew . 'vat_id', $imprintFields['sales_tax_id_number']);
$installer->setConfigData($prefixNew . 'court', $imprintFields['commercial_register']);
$installer->setConfigData($prefixNew . 'financial_office', $imprintFields['tax_office']);
$installer->setConfigData($prefixNew . 'ceo', $imprintFields['holder_names']);
$installer->setConfigData($prefixNew . 'register_number', $imprintFields['hrb']);
$installer->setConfigData($prefixNew . 'business_rules', $this->getTemplateContent($imprintFields['legal_info']));
$installer->setConfigData($prefixNew . 'bank_account', $imprintFields['bank_account']);
$installer->setConfigData($prefixNew . 'bank_code_number', $imprintFields['bank_id_code']);
$installer->setConfigData($prefixNew . 'bank_account_owner', $imprintFields['bank_account_owner']);
$installer->setConfigData($prefixNew . 'bank_name', $imprintFields['bank_name']);
$installer->setConfigData($prefixNew . 'swift', $imprintFields['bank_swift']);
$installer->setConfigData($prefixNew . 'iban', $imprintFields['bank_iban']);

// set some misc data
$installer->setConfigData('sales_pdf/invoice/put_order_id', '1');
$installer->setConfigData('sales_pdf/invoice/maturity', $imprintFields['invoice_maturity']);
$installer->setConfigData('sales_pdf/invoice/note', $imprintFields['invoice_note']);
$installer->setConfigData('sales_pdf/shipment/put_order_id', '1');
$installer->setConfigData('sales_pdf/creditmemo/put_order_id', '1');
$installer->setConfigData('sales/identity/logo', 'default/logo.jpg');
$installer->setConfigData('sales_pdf/invoice/customeridprefix', $imprintFields['invoice_customer_prefix']);
$installer->setConfigData('tax/display/shippingurl', 'lieferung');