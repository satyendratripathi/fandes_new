<?php
/**
 * Venustheme
 * 
 * NOTICE OF LICENSE
 * 
 * This source file is subject to the Venustheme.com license that is
 * available through the world-wide-web at this URL:
 * http://www.venustheme.com/license-agreement.html
 * 
 * DISCLAIMER
 * 
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 * 
 * @category   Venustheme
 * @package    Ves_Blog
 * @copyright  Copyright (c) 2016 Venustheme (http://www.venustheme.com/)
 * @license    http://www.venustheme.com/LICENSE-1.0.html
 */
namespace Ves\Blog\Block\Adminhtml\Post\Edit\Tab;

class Content extends \Magento\Backend\Block\Widget\Form\Generic implements
    \Magento\Backend\Block\Widget\Tab\TabInterface
{
    /**
     * @var \Magento\Cms\Model\Wysiwyg\Config
     */
    protected $_wysiwygConfig;

    /**
     * @param \Magento\Backend\Block\Template\Context
     * @param \Magento\Framework\Registry
     * @param \Magento\Framework\Data\FormFactory
     * @param \Magento\Cms\Model\Wysiwyg\Config
     * @param array
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig,
        array $data = []
    ) {
        $this->_wysiwygConfig = $wysiwygConfig;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * Prepare form
     *
     * @return $this
     */
    protected function _prepareForm()
    {
        $this->_eventManager->dispatch(
            'ves_check_license',
            ['obj' => $this,'ex'=>'Ves_Blog']
            );
        /** @var $model \Magento\Cms\Model\Page */
        $model = $this->_coreRegistry->registry('current_post');

        /*
         * Checking if user have permissions to save information
         */
        if ($this->_isAllowedAction('Ves_Blog::post_edit')) {
            $isElementDisabled = false;
        } else {
            $isElementDisabled = true;
        }
        $wysiwygConfig = $this->_wysiwygConfig->getConfig(['tab_id' => $this->getTabId().time()]);
        if (!$this->getData('is_valid') && !$this->getData('local_valid')) {
            $isElementDisabled = true;
            $wysiwygConfig['enabled'] = $wysiwygConfig['add_variables'] = $wysiwygConfig['add_widgets'] = $wysiwygConfig['add_images'] = 0;
            $wysiwygConfig['plugins'] = [];
        }

        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create();

        $form->setHtmlIdPrefix('post_');


        $fieldset = $form->addFieldset(
            'shortcontent_fieldset',
            [
                'legend' => __('Short Content'),
                'class' => 'fieldset-wide vesblog-fullwidth'
            ]
        );

        

        $contentField = $fieldset->addField(
            'short_content',
            'editor',
            [
                'name'     => 'short_content',
                'style'    => 'height:20em;',
                'disabled' => $isElementDisabled,
                'config'   => $wysiwygConfig
            ]
        );


        $fieldset = $form->addFieldset(
            'content_fieldset',
            ['legend' => __('Content'), 'class' => 'fieldset-wide']
        );

        $wysiwygConfig = $this->_wysiwygConfig->getConfig(['tab_id' => $this->getTabId().time()]);
        if (!$this->getData('is_valid') && !$this->getData('local_valid')) {
            $wysiwygConfig['enabled'] = $wysiwygConfig['add_variables'] = $wysiwygConfig['add_widgets'] = $wysiwygConfig['add_images'] = 0;
            $wysiwygConfig['plugins'] = [];
        }

        $contentField = $fieldset->addField(
            'content',
            'editor',
            [
                'name' => 'content',
                'style' => 'height:36em;',
                'required' => true,
                'disabled' => $isElementDisabled,
                'config' => $wysiwygConfig
            ]
        );

        // Setting custom renderer for content field to remove label column
        $renderer = $this->getLayout()->createBlock(
            'Magento\Backend\Block\Widget\Form\Renderer\Fieldset\Element'
        )->setTemplate(
            'Magento_Cms::page/edit/form/renderer/content.phtml'
        );
        $contentField->setRenderer($renderer);

        $this->_eventManager->dispatch('adminhtml_cms_page_edit_tab_content_prepare_form', ['form' => $form]);
        $form->setValues($model->getData());
        $this->setForm($form);

        return parent::_prepareForm();
    }

    /**
     * Prepare label for tab
     *
     * @return \Magento\Framework\Phrase
     */
    public function getTabLabel()
    {
        return __('Content');
    }

    /**
     * Prepare title for tab
     *
     * @return \Magento\Framework\Phrase
     */
    public function getTabTitle()
    {
        return __('Content');
    }

    /**
     * Returns status flag about this tab can be shown or not
     *
     * @return bool
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * Returns status flag about this tab hidden or not
     *
     * @return bool
     */
    public function isHidden()
    {
        return false;
    }

    /**
     * Check permission for passed action
     *
     * @param string $resourceId
     * @return bool
     */
    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }
}