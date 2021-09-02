<?php
namespace MGS\StoreLocator\Controller\Route;

/**
 * Interceptor class for @see \MGS\StoreLocator\Controller\Route
 */
class Interceptor extends \MGS\StoreLocator\Controller\Route implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\ActionFactory $actionFactory, \Magento\Framework\App\ResponseInterface $response, \MGS\StoreLocator\Model\StoreFactory $storeFactory)
    {
        $this->___init();
        parent::__construct($actionFactory, $response, $storeFactory);
    }

    /**
     * {@inheritdoc}
     */
    public function match(\Magento\Framework\App\RequestInterface $request)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'match');
        return $pluginInfo ? $this->___callPlugins('match', func_get_args(), $pluginInfo) : parent::match($request);
    }
}
