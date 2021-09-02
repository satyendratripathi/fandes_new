<?php
namespace Lof\Autosearch\Block\Product\ListProductSearch;

/**
 * Interceptor class for @see \Lof\Autosearch\Block\Product\ListProductSearch
 */
class Interceptor extends \Lof\Autosearch\Block\Product\ListProductSearch implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Catalog\Block\Product\Context $context, \Magento\Framework\Data\Helper\PostHelper $postDataHelper, \Magento\Catalog\Model\Layer\Resolver $layerResolver, \Magento\Catalog\Api\CategoryRepositoryInterface $categoryRepository, \Magento\Framework\Url\Helper\Data $urlHelper, \Lof\Autosearch\Helper\Data $dataHelper, \Lof\Autosearch\Model\ResourceModel\Search\CollectionFactory $searchCollection, \Magento\Framework\App\RequestInterface $request, \Magento\Search\Model\QueryFactory $queryFactory, array $data = [])
    {
        $this->___init();
        parent::__construct($context, $postDataHelper, $layerResolver, $categoryRepository, $urlHelper, $dataHelper, $searchCollection, $request, $queryFactory, $data);
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
