<?php
namespace MGS\Mpanel\Controller\Index\Confirm;

/**
 * Interceptor class for @see \MGS\Mpanel\Controller\Index\Confirm
 */
class Interceptor extends \MGS\Mpanel\Controller\Index\Confirm implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Action\Context $context, \Magento\Framework\View\Element\Context $urlContext, \Magento\Customer\Model\Session $customerSession, \MGS\Mpanel\Model\ResourceModel\Section\CollectionFactory $sectionFactory, \MGS\Mpanel\Model\ResourceModel\Childs\CollectionFactory $childsFactory)
    {
        $this->___init();
        parent::__construct($context, $urlContext, $customerSession, $sectionFactory, $childsFactory);
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
