<?php
namespace MGS\InstantSearch\Controller\Blog\Result;

/**
 * Interceptor class for @see \MGS\InstantSearch\Controller\Blog\Result
 */
class Interceptor extends \MGS\InstantSearch\Controller\Blog\Result implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Action\Context $context, \Magento\Catalog\Model\Session $catalogSession, \Magento\Store\Model\StoreManagerInterface $storeManager, \Magento\Search\Model\QueryFactory $queryFactory, \MGS\InstantSearch\Model\Search $search, \Magento\Framework\View\Result\PageFactory $resultPageFactory, \MGS\InstantSearch\Helper\Data $inSearchHelper)
    {
        $this->___init();
        parent::__construct($context, $catalogSession, $storeManager, $queryFactory, $search, $resultPageFactory, $inSearchHelper);
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
