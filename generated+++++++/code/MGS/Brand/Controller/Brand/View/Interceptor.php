<?php
namespace MGS\Brand\Controller\Brand\View;

/**
 * Interceptor class for @see \MGS\Brand\Controller\Brand\View
 */
class Interceptor extends \MGS\Brand\Controller\Brand\View implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Action\Context $context, \Magento\Store\Model\StoreManager $storeManager, \Magento\Framework\View\Result\PageFactory $resultPageFactory, \MGS\Brand\Model\Brand $brandModel, \Magento\Framework\Registry $coreRegistry, \MGS\Brand\Model\Layer\Resolver $layerResolver, \Magento\Framework\Controller\Result\ForwardFactory $resultForwardFactory, \MGS\Brand\Helper\Data $brandHelper)
    {
        $this->___init();
        parent::__construct($context, $storeManager, $resultPageFactory, $brandModel, $coreRegistry, $layerResolver, $resultForwardFactory, $brandHelper);
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
