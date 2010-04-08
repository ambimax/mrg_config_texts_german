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
    public function getConfigData()
    {
        return Mage::getConfig()->getNode('default/config_german_texts')->asArray();
    }

    private function getConfigNode($node, $nextNode = null)
    {
        $configData = $this->getConfigData();
        if ($nextNode) {
            return $configData[$node][$nextNode];
        }
        else {
            return $configData[$node];
        }
    }

    public function getConfigPages()
    {
        return $this->getConfigNode('pages', 'default');
    }

    public function getConfigBlocks()
    {
        return $this->getConfigNode('blocks', 'default');
    }

    public function getConfigEmails()
    {
        return $this->getConfigNode('emails', 'default');
    }

    public function getConfigImprint()
    {
        return $this->getConfigNode('imprint');
    }

    public function getTemplateContent($filename)
    {
        return file_get_contents(Mage::getBaseDir() . '/' . $filename);
    }

    public function getFooterLinks()
    {
        return $this->getConfigNode('footer_links', 'default');
    }

    public function createCmsPage($pageData)
    {
        $data = array(
            'title' => $pageData['title'],
            'identifier' => $pageData['identifier'],
            'content' => $this->getTemplateContent($pageData['text']),
            'root_template' => $pageData['root_template'],
            'stores' => array('1'),
            'is_active' => '1',
        );

        Mage::getModel('cms/page')->setData($data)->save();
    }

    public function createCmsBlock($blockData)
    {
        $data = array(
            'title' => $blockData['title'],
            'identifier' => $blockData['identifier'],
            'content' => $this->getTemplateContent($blockData['text']),
            'stores' => array('1'),
            'is_active' => '1',
        );

        $model = Mage::getModel('cms/block');

        $block = $model->load($blockData['identifier']);

        if (! $block->getId()) {
            $model->setData($data)->save();
        }
        else {
            $data['block_id'] = $block->getId();
            $model->setData($data)->save();
        }
    }

    public function createFooterLinksContent()
    {
        $footerLinksHtml = '<ul>';
        $footerLinksCounter = 0;
        foreach ($this->getFooterLinks() as $link => $data) {
            $footerLinksCounter++;
            $title = $data['title'];
            $target = $data['target'];
            $footerLinksHtml .= '<li class="'.(($footerLinksCounter == count($this->getFooterLinks())) ? 'last' : '').'"><a href="{{store url="'.$target.'"}}">' . $title . '</a></li>';
        }

        $footerLinksHtml .= '</ul>';
        return $footerLinksHtml;
    }

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
}