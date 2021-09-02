<?php
namespace Lof\RecentOrder\Block\RecentOrder;

/**
 * Interceptor class for @see \Lof\RecentOrder\Block\RecentOrder
 */
class Interceptor extends \Lof\RecentOrder\Block\RecentOrder implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Catalog\Block\Product\Context $context, \Magento\Framework\Url\Helper\Data $urlHelper, \Magento\Framework\ObjectManagerInterface $objectManager, \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory, \Magento\Catalog\Model\Product\Visibility $catalogProductVisibility, \Magento\CatalogInventory\Helper\Stock $stockFilter, \Magento\CatalogInventory\Model\Configuration $stockConfig, \Lof\RecentOrder\Helper\Data $helper, \Magento\Store\Model\StoreManagerInterface $storeManager, array $data = [])
    {
        $this->___init();
        parent::__construct($context, $urlHelper, $objectManager, $productCollectionFactory, $catalogProductVisibility, $stockFilter, $stockConfig, $helper, $storeManager, $data);
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
