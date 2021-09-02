<?php
namespace Lof\Autosearch\Block\Item;

/**
 * Interceptor class for @see \Lof\Autosearch\Block\Item
 */
class Interceptor extends \Lof\Autosearch\Block\Item implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Catalog\Block\Product\Context $context, \Magento\Framework\Url\Helper\Data $urlHelper, \Magento\Framework\Data\Form\FormKey $formKey, array $data = [])
    {
        $this->___init();
        parent::__construct($context, $urlHelper, $formKey, $data);
    }

    /**
     * {@inheritdoc}
     */
    public function getImage($product, $imageId, $attributes = [])
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getImage');
        return $pluginInfo ? $this->___callPlugins('getImage', func_get_args(), $pluginInfo) : parent::getImage($product, $imageId, $attributes);
    }
}
