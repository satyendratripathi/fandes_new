<?php
namespace MGS\Mpanel\Block\Products\Deals;

/**
 * Interceptor class for @see \MGS\Mpanel\Block\Products\Deals
 */
class Interceptor extends \MGS\Mpanel\Block\Products\Deals implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Catalog\Block\Product\Context $context, \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory, \Magento\Catalog\Model\Product\Visibility $catalogProductVisibility, \Magento\Framework\App\Http\Context $httpContext, \Magento\Framework\ObjectManagerInterface $objectManager, \Magento\Framework\Stdlib\DateTime\DateTime $date, \Magento\Framework\Url\Helper\Data $urlHelper, \Magento\Framework\Data\Form\FormKey $formKey, array $data = [])
    {
        $this->___init();
        parent::__construct($context, $productCollectionFactory, $catalogProductVisibility, $httpContext, $objectManager, $date, $urlHelper, $formKey, $data);
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
