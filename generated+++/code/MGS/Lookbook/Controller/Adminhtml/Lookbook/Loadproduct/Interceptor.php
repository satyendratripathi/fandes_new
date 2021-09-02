<?php
namespace MGS\Lookbook\Controller\Adminhtml\Lookbook\Loadproduct;

/**
 * Interceptor class for @see \MGS\Lookbook\Controller\Adminhtml\Lookbook\Loadproduct
 */
class Interceptor extends \MGS\Lookbook\Controller\Adminhtml\Lookbook\Loadproduct implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Magento\Catalog\Block\Product\Context $catalogContext, \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory, \Magento\Catalog\Model\Product\Visibility $catalogProductVisibility)
    {
        $this->___init();
        parent::__construct($context, $catalogContext, $productCollectionFactory, $catalogProductVisibility);
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
