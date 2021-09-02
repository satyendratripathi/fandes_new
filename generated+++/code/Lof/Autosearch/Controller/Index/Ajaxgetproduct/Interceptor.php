<?php
namespace Lof\Autosearch\Controller\Index\Ajaxgetproduct;

/**
 * Interceptor class for @see \Lof\Autosearch\Controller\Index\Ajaxgetproduct
 */
class Interceptor extends \Lof\Autosearch\Controller\Index\Ajaxgetproduct implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Action\Context $context, \Magento\Framework\View\Result\PageFactory $resultPageFactory, \Magento\CatalogSearch\Helper\Data $catalogSearchData, \Magento\Store\Model\StoreManagerInterface $storeManager, \Magento\Search\Model\QueryFactory $queryFactory, \Magento\Catalog\Model\Layer\Resolver $layerResolver, \Lof\Autosearch\Helper\Data $helper, \Lof\Autosearch\Model\Search $searchModel, \Magento\Catalog\Model\Category $categoryModel, \Magento\Search\Model\ResourceModel\Query\CollectionFactory $queriesFactory, \Magento\Search\Helper\Data $searchHelper, \Magento\Framework\Url $urlHelper)
    {
        $this->___init();
        parent::__construct($context, $resultPageFactory, $catalogSearchData, $storeManager, $queryFactory, $layerResolver, $helper, $searchModel, $categoryModel, $queriesFactory, $searchHelper, $urlHelper);
    }

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'execute');
        return $pluginInfo ? $this->___callPlugins('execute', func_get_args(), $pluginInfo) : parent::execute();
    }

    /**
     * {@inheritdoc}
     */
    public function dispatch(\Magento\Framework\App\RequestInterface $request)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'dispatch');
        return $pluginInfo ? $this->___callPlugins('dispatch', func_get_args(), $pluginInfo) : parent::dispatch($request);
    }
}
