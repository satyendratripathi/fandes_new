<?php
namespace MGS\InstantSearch\Block\SearchResult\ListProduct;

/**
 * Interceptor class for @see \MGS\InstantSearch\Block\SearchResult\ListProduct
 */
class Interceptor extends \MGS\InstantSearch\Block\SearchResult\ListProduct implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Catalog\Block\Product\Context $context, \MGS\InstantSearch\Helper\Data $inSearchHelper, \Magento\Catalog\Model\Layer\Resolver $layerResolver, \Magento\Search\Model\QueryFactory $queryFactory, \Magento\Framework\Url\Helper\Data $urlHelper, array $data = [])
    {
        $this->___init();
        parent::__construct($context, $inSearchHelper, $layerResolver, $queryFactory, $urlHelper, $data);
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
