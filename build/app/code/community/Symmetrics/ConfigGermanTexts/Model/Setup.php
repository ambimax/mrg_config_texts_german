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

/**
 * Setup model
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
class Symmetrics_ConfigGermanTexts_Model_Setup extends Mage_Eav_Model_Entity_Setup
{
    /**
     * Get config.xml data
     * 
     * @return array
     */
    public function getConfigData()
    {
        $configData = Mage::getConfig()
            ->getNode('default/config_german_texts')
            ->asArray();
            
        return $configData;
    }

    /**
     * Get config.xml data
     * 
     * @param string      $node      xml noce
     * @param string|null $childNode if set, child node of the first noce
     * 
     * @return array
     */
    protected function _getConfigNode($node, $childNode = null)
    {
        $configData = $this->getConfigData();
        if ($childNode) {
            return $configData[$node][$childNode];
        } else {
            return $configData[$node];
        }
    }

    /**
     * Get pages/default from config file
     * 
     * @return array
     */
    public function getConfigPages()
    {
        return $this->_getConfigNode('pages', 'default');
    }

    /**
     * Get blocks/default from config file
     * 
     * @return array
     */
    public function getConfigBlocks()
    {
        return $this->_getConfigNode('blocks', 'default');
    }

    /**
     * Get emails/default from config file
     * 
     * @return array
     */
    public function getConfigEmails()
    {
        return $this->_getConfigNode('emails', 'default');
    }

    /**
     * Get imprint from config file
     * 
     * @return array
     */
    public function getConfigImprint()
    {
        return $this->_getConfigNode('imprint');
    }

    /**
     * Get template content
     * 
     * @param string $filename template file name
     * 
     * @return string
     */
    public function getTemplateContent($filename)
    {
        return file_get_contents(Mage::getBaseDir() . DS . $filename);
    }

    /**
     * Get footer_links/default from config file
     * 
     * @return array
     */
    public function getFooterLinks()
    {
        return $this->_getConfigNode('footer_links', 'default');
    }

    /**
     * Collect data and create CMS page
     *
     * @param array $pageData cms page data
     *
     * @return void
     */
    public function createCmsPage($pageData)
    {
        if (is_array($pageData)) {
            foreach ($pageData as $key => $value) {
                $data[$key] = $value;
            }
            $data['stores'] = array('0');
            $data['is_active'] = '1';
        } else {
            return null;
        }

        $model = Mage::getModel('cms/page');
        $page = $model->load($pageData['identifier']);

        if (!$page->getId()) {
            $model->setData($data)->save();
        } else {
            $data['page_id'] = $page->getId();
            $model->setData($data)->save();
        }
    }
    
    /**
     * Collect data and create CMS block
     *
     * @param array   $blockData cms block data
     * @param boolean $override  override cms block if it exists
     *
     * @return void
     */
    public function createCmsBlock($blockData, $override=true)
    {
        $model = Mage::getModel('cms/block');
        $block = $model->load($blockData['identifier']);
        $blockData['content'] = $this->getTemplateContent($blockData['text']);
        if (!$block->getId()) {
            $blockData['stores'] => array('0');
            $blockData['is_active'] => '1';

            $model->setData($blockData)->save();
        } else {
            if ($override) {
                $data['block_id'] = $block->getId();
                $model->setData($blockData)->save();
            }
        }
    }

    /**
     * Generate footer_links block from config data
     * 
     * @return string
     */
    public function createFooterLinksContent()
    {
        $footerLinksHtml = '<ul>';
        $footerLinksCounter = 0;
        foreach ($this->getFooterLinks() as $link => $data) {
            $footerLinksCounter++;
            $title = $data['title'];
            $target = $data['target'];
            $class = '';
            if ($footerLinksCounter == count($this->getFooterLinks())) {
                $class = 'last';
            }
            $footerLinksHtml .= '<li class="'.$class.'"><a href="{{store url="' . $target . '"}}">' . $title . '</a></li>';
        }

        $footerLinksHtml .= '</ul>';
        
        return $footerLinksHtml;
    }

    /**
     * Update footer_links cms block
     * 
     * @param array $blockData cms block data
     * 
     * @return void
     */
    public function updateFooterLinksBlock($blockData)
    {
        $model = Mage::getModel('cms/block');
        $block = $model->load($blockData['identifier']);

        if ($block->getId()) {
            $data = array();
            $data['block_id'] = $block->getId();
            $data['identifier'] = $blockData['identifier'] . '_backup';
            $model->setData($data)->save();
        }

        $data = array(
            'title' => $blockData['title'],
            'identifier' => $blockData['identifier'],
            'content' => $this->createFooterLinksContent(),
            'stores' => array('0'),
            'is_active' => '1',
        );

        $model->setData($data)->save();
    }

    /**
     * Create transactional email template
     * 
     * @param array $emailData template data
     * 
     * @return void
     * 
     * @todo check if template exists
     */
    public function createEmail($emailData)
    {
        $model = Mage::getModel('core/email_template');
        $template = $model->setTemplateSubject($emailData['template_subject'])
            ->setTemplateCode($emailData['template_code'])
            ->setTemplateText($this->getTemplateContent($emailData['text']))
            ->setTemplateType($emailData['template_type'])
            ->setModifiedAt(Mage::getSingleton('core/date')->gmtDate())
            ->save();

        $this->setConfigData($emailData['config_data_path'], $template->getId());
    }
    
    /**
     * Create transactional email template
     * 
     * @param string $newPath new config path
     * @param string $oldPath old config path
     * 
     * @return void
     */
    public function moveConfigData($newPath, $oldPath)
    {
        if($value = Mage::getStoreConfig($oldPath)) {
            Mage::setStoreConfig($newPath, $value);
        }
    }
    
    /**
     * Update CMS pages if upgrading from previous versions
     *
     * @return void
     */
    public function updatePages()
    {
        /**
         * @var $pageCollection Mage_Cms_Model_Mysql4_Page_Collection
         */
        $pageCollection = Mage::getModel('cms/page')->getCollection();
        foreach ($pageCollection as $page) {
            $content = $page->getContent();
            $content = $this->_replaceContent($content);
            $page->setContent($content)
                ->save();
        }
    }
    
    /**
     * Define which strings to replace with what
     * 
     * @return array
     */
    protected function _getReplaceStrings()
    {
        $strings['search'] = array(
            '{{block type="symmetrics_impressum/impressum" value="shopname"}}',
            '{{block type="symmetrics_impressum/impressum" value="company1"}}',
            '{{block type="symmetrics_impressum/impressum" value="company2"}}',
            '{{block type="symmetrics_impressum/impressum" value="street"}}',
            '{{block type="symmetrics_impressum/impressum" value="zip"}}',
            '{{block type="symmetrics_impressum/impressum" value="city"}}',
            '{{block type="symmetrics_impressum/impressum" value="telephone"}}',
            '{{block type="symmetrics_impressum/impressum" value="fax"}}',
            '{{block type="symmetrics_impressum/impressum" value="email"}}',
            '{{block type="symmetrics_impressum/impressum" value="web"}}',
            '{{block type="symmetrics_impressum/impressum" value="taxnumber"}}',
            '{{block type="symmetrics_impressum/impressum" value="vatid"}}',
            '{{block type="symmetrics_impressum/impressum" value="court"}}',
            '{{block type="symmetrics_impressum/impressum" value="taxoffice"}}',
            '{{block type="symmetrics_impressum/impressum" value="ceo"}}',
            '{{block type="symmetrics_impressum/impressum" value="hrb"}}',
            '{{block type="symmetrics_impressum/impressum" value="legal"}}',
            '{{block type="symmetrics_impressum/impressum" value="bankaccountowner"}}',
            '{{block type="symmetrics_impressum/impressum" value="bankaccount"}}',
            '{{block type="symmetrics_impressum/impressum" value="bankcodenumber"}}',
            '{{block type="symmetrics_impressum/impressum" value="bankname"}}',
            '{{block type="symmetrics_impressum/impressum" value="swift"}}',
            '{{block type="symmetrics_impressum/impressum" value="iban"}}',
            '{{block type="symmetrics_impressum/impressum" value="bank"}}',
            
            '{{block type="symmetrics_impressum/impressum" value="emailfooter"}}',
            '{{block type="symmetrics_impressum/impressum" value="address"}}',
            '{{block type="symmetrics_impressum/impressum" value="communication"}}',
            '{{block type="symmetrics_impressum/impressum" value="legal"}}',
            '{{block type="symmetrics_impressum/impressum" value="tax"}}',
            '{{block type="symmetrics_impressum/impressum" value="bank"}}',
            
            '{{block type="symmetrics_impressum/impressum" value="web_href"}}',
            '{{block type="symmetrics_impressum/impressum" value="email_href"}}',
            
            '{{block type="symmetrics_impressum/impressum" value="imprint"}}',
            
            '{{block type="symmetrics_impressum/impressum" value="imprintplain"}}'
        );
        
        $strings['replace'] = array(
            '{{block type="imprint/field" value="shop_name"}}',
            '{{block type="imprint/field" value="company_first"}}',
            '{{block type="imprint/field" value="company_second"}}',
            '{{block type="imprint/field" value="street"}}',
            '{{block type="imprint/field" value="zip"}}',
            '{{block type="imprint/field" value="city"}}',
            '{{block type="imprint/field" value="telephone"}}',
            '{{block type="imprint/field" value="fax"}}',
            '{{block type="imprint/field" value="email"}}',
            '{{block type="imprint/field" value="web"}}',
            '{{block type="imprint/field" value="tax_number"}}',
            '{{block type="imprint/field" value="vat_id"}}',
            '{{block type="imprint/field" value="court"}}',
            '{{block type="imprint/field" value="financial_office"}}',
            '{{block type="imprint/field" value="ceo"}}',
            '{{block type="imprint/field" value="register_number"}}',
            '{{block type="imprint/field" value="business_rules"}}',
            '{{block type="imprint/field" value="bank_account_owner"}}',
            '{{block type="imprint/field" value="bank_account"}}',
            '{{block type="imprint/field" value="bank_code_number"}}',
            '{{block type="imprint/field" value="bank_name"}}',
            '{{block type="imprint/field" value="swift"}}',
            '{{block type="imprint/field" value="iban"}}',
            
            '{{block type="imprint/content" template="symmetrics/imprint/email/footer.phtml"}}',
            '{{block type="imprint/content" template="symmetrics/imprint/address.phtml"}}',
            '{{block type="imprint/content" template="symmetrics/imprint/communication.phtml"}}',
            '{{block type="imprint/content" template="symmetrics/imprint/legal.phtml"}}',
            '{{block type="imprint/content" template="symmetrics/imprint/tax.phtml"}}',
            '{{block type="imprint/content" template="symmetrics/imprint/bank.phtml"}}',
            
            '{{block type="imprint/field" value="web"}}',
            '{{block type="imprint/field" value="email"}}',
            
            '{{block type="imprint/content" template="symmetrics/imprint/email/footer.phtml"}}
            {{block type="imprint/content" template="symmetrics/imprint/tax.phtml"}}
            {{block type="imprint/content" template="symmetrics/imprint/legal.phtml"}}
            {{block type="imprint/content" template="symmetrics/imprint/bank.phtml"}}',
            
            '{{block type="imprint/content" template="symmetrics/imprint/email/footer.phtml"}}
            {{block type="imprint/content" template="symmetrics/imprint/tax.phtml"}}
            {{block type="imprint/content" template="symmetrics/imprint/legal.phtml"}}
            {{block type="imprint/content" template="symmetrics/imprint/bank.phtml"}}',
        );
        
        return $strings;
    }
    
    /**
     * Replace some old values for upgrading
     * 
     * @param string $content   content ro replace
     * @param string $storeurls replace store url notation
     *                          only in symmetrics blocks
     * 
     * @return string
     */
    protected function _replaceContent($content, $storeUrls=true)
    {
        $content = str_replace(
            '{{block type="cms/block" block_id="sym_agb"}}',
            '{{block type="cms/block" block_id="symmetrics_business_terms"}}',
            $content
        );
        $content = str_replace(
            '{{block type="cms/block" block_id="sym_widerruf"}}',
            '{{block type="cms/block" block_id="symmetrics_revocation"}}',
            $content
        );
        
        $content = preg_replace('!\{\{store url=""\}\}([^\"\>\}]+)!', '{{store url="$1"}}', $content);
        
        $replaceStrings = $this->_getReplaceStrings();
        $content = str_replace($replaceStrings['search'], $replaceStrings['replace'], $content);

        return $content;
    }
    
    /**
     * Update CMS blocks if upgrading from previous versions
     *
     * @return void
     */
    public function updateBlocks()
    {
        /**
         * @var $blockCollection Mage_Cms_Model_Mysql4_Block_Collection
         */
        $blockCollection = Mage::getModel('cms/block')->getCollection();
        foreach ($blockCollection as $block) {
            $storeurls = false;
            if ($block->getIdentifier() == 'sym_agb') {
                $block->setIdentifier('symmetrics_business_terms');
                $storeurls = true;
            }
            if ($block->getIdentifier() == 'sym_widerruf') {
                $block->setIdentifier('symmetrics_revocation');
                $storeurls = true;
            }
            $content = $block->getContent();
            $content = $this->_replaceContent($content, $storeurls);
            $block->setContent($content)
                ->save();
        }
    }
    
    /**
     * Update agreements if upgrading from previous versions
     *
     * @return void
     */
    public function updateAgreements()
    {
        /**
         * @var $agreementCollection Mage_Checkout_Model_Mysql4_Agreement_Collection
         */
        $agreementCollection = Mage::getModel('checkout/agreement')
            ->getCollection();
        foreach ($agreementCollection as $agreement) {
            $content = $agreement->getContent();
            $content = $this->_replaceContent($content);
            $agreement->setContent($content)
                ->save();
        }
    }
}