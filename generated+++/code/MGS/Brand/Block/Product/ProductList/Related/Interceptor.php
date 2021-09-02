<?php
namespace MGS\Brand\Block\Product\ProductList\Related;

/**
 * Interceptor class for @see \MGS\Brand\Block\Product\ProductList\Related
 */
class Interceptor extends \MGS\Brand\Block\Product\ProductList\Related implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Catalog\Block\Product\Context $context, \MGS\Brand\Helper\Data $brandHelper, \MGS\Brand\Model\Brand $brand, \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory, \Magento\Catalog\Model\Product\Visibility $catalogProductVisibility, \Magento\Framework\App\Http\Context $httpContext, array $data = [])
    {
        $this->___init();
        parent::__construct($context, $brandHelper, $brand, $productCollectionFactory, $catalogProductVisibility, $httpContext, $data);
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
