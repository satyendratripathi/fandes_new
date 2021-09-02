<?php
namespace MGS\Mpanel\Controller\Category\Save;

/**
 * Interceptor class for @see \MGS\Mpanel\Controller\Category\Save
 */
class Interceptor extends \MGS\Mpanel\Controller\Category\Save implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Action\Context $context, \Magento\Catalog\Model\CategoryFactory $categoryFactory, \Magento\Catalog\Api\CategoryRepositoryInterface $repository, \Magento\Customer\Model\Session $customerSession)
    {
        $this->___init();
        parent::__construct($context, $categoryFactory, $repository, $customerSession);
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
