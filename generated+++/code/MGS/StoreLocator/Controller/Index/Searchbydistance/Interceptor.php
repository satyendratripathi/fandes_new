<?php
namespace MGS\StoreLocator\Controller\Index\Searchbydistance;

/**
 * Interceptor class for @see \MGS\StoreLocator\Controller\Index\Searchbydistance
 */
class Interceptor extends \MGS\StoreLocator\Controller\Index\Searchbydistance implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Action\Context $context, \MGS\StoreLocator\Model\StoreFactory $storeFactory, \Magento\Framework\Session\SessionManager $sessionManager)
    {
        $this->___init();
        parent::__construct($context, $storeFactory, $sessionManager);
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
