<?php
namespace Ves\Brand\Controller\Router;

/**
 * Interceptor class for @see \Ves\Brand\Controller\Router
 */
class Interceptor extends \Ves\Brand\Controller\Router implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\ActionFactory $actionFactory, \Magento\Framework\App\ResponseInterface $response, \Magento\Framework\Event\ManagerInterface $eventManager, \Ves\Brand\Model\Brand $brandCollection, \Ves\Brand\Model\Group $groupCollection, \Ves\Brand\Helper\Data $brandHelper, \Magento\Store\Model\StoreManagerInterface $storeManager)
    {
        $this->___init();
        parent::__construct($actionFactory, $response, $eventManager, $brandCollection, $groupCollection, $brandHelper, $storeManager);
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
