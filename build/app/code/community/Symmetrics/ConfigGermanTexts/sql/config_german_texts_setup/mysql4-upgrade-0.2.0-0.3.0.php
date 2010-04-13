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

$prefixNew = 'general/imprint/';
$prefixOld = 'general/impressum/';

$installer->moveConfigData($prefixNew . 'shop_name', $prefixOld . 'shopname');
$installer->moveConfigData($prefixNew . 'company_first', $prefixOld . 'company1');
$installer->moveConfigData($prefixNew . 'company_second', $prefixOld . 'company2');
$installer->moveConfigData($prefixNew . 'street', $prefixOld . 'street');
$installer->moveConfigData($prefixNew . 'zip', $prefixOld . 'zip');
$installer->moveConfigData($prefixNew . 'city', $prefixOld . 'city');
$installer->moveConfigData($prefixNew . 'telephone', $prefixOld . 'telephone');
$installer->moveConfigData($prefixNew . 'fax', $prefixOld . 'fax');
$installer->moveConfigData($prefixNew . 'email', $prefixOld . 'email');
$installer->moveConfigData($prefixNew . 'web', $prefixOld . 'web');
$installer->moveConfigData($prefixNew . 'tax_number', $prefixOld . 'taxnumber');
$installer->moveConfigData($prefixNew . 'vat_id', $prefixOld . 'vatid');
$installer->moveConfigData($prefixNew . 'court', $prefixOld . 'court');
$installer->moveConfigData($prefixNew . 'financial_office', $prefixOld . 'taxoffice');
$installer->moveConfigData($prefixNew . 'ceo', $prefixOld . 'ceo');
$installer->moveConfigData($prefixNew . 'register_number', $prefixOld . 'hrb');
$installer->moveConfigData($prefixNew . 'bank_account', $prefixOld . 'bankaccount');
$installer->moveConfigData($prefixNew . 'bank_code_number', $prefixOld . 'bankcodenumber');
$installer->moveConfigData($prefixNew . 'bank_account_owner', $prefixOld . 'bankaccountowner');
$installer->moveConfigData($prefixNew . 'bank_name', $prefixOld . 'bankname');
$installer->moveConfigData($prefixNew . 'swift', $prefixOld . 'swift');
$installer->moveConfigData($prefixNew . 'iban', $prefixOld . 'iban');
$installer->moveConfigData($prefixNew . 'business_rules', $prefixOld . 'rechtlicheregelungen');

$this->updatePages();
$this->updateBlocks();
$this->updateAgreements();

$installer->endSetup();