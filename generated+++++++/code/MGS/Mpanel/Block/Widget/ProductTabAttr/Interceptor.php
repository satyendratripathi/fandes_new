<?php
namespace MGS\Mpanel\Block\Widget\ProductTabAttr;

/**
 * Interceptor class for @see \MGS\Mpanel\Block\Widget\ProductTabAttr
 */
class Interceptor extends \MGS\Mpanel\Block\Widget\ProductTabAttr implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Catalog\Block\Product\Context $context, \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory, \Magento\Catalog\Model\Product\Visibility $catalogProductVisibility, \Magento\Framework\App\Http\Context $httpContext, \Magento\Framework\Stdlib\DateTime\DateTime $date, \Magento\Store\Model\StoreManagerInterface $storeManager, \Magento\Framework\ObjectManagerInterface $objectManager, \Magento\Framework\App\ResourceConnection $resource, \Magento\Framework\Url\Helper\Data $urlHelper, \Magento\Catalog\Model\ResourceModel\Product\Attribute\CollectionFactory $attributeCollection, array $data = [])
    {
        $this->___init();
        parent::__construct($context, $productCollectionFactory, $catalogProductVisibility, $httpContext, $date, $storeManager, $objectManager, $resource, $urlHelper, $attributeCollection, $data);
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
