<?php
namespace MGS\GDPR\Controller\Customer\Save;

/**
 * Interceptor class for @see \MGS\GDPR\Controller\Customer\Save
 */
class Interceptor extends \MGS\GDPR\Controller\Customer\Save implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Action\Context $context, \Magento\Customer\Model\Session $customerSession, \Magento\Framework\Data\Form\FormKey\Validator $formKeyValidator, \Magento\Store\Model\StoreManagerInterface $storeManager, \Magento\Quote\Model\ResourceModel\Quote\CollectionFactory $quoteFactory, \MGS\GDPR\Model\ResourceModel\Contact\CollectionFactory $contactFactory, \Magento\Framework\Registry $registry, \Magento\Customer\Api\CustomerRepositoryInterface $customerRepository)
    {
        $this->___init();
        parent::__construct($context, $customerSession, $formKeyValidator, $storeManager, $quoteFactory, $contactFactory, $registry, $customerRepository);
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
