<?php
namespace MGS\Lookbook\Controller\Adminhtml\Lookbook\Checkproduct;

/**
 * Interceptor class for @see \MGS\Lookbook\Controller\Adminhtml\Lookbook\Checkproduct
 */
class Interceptor extends \MGS\Lookbook\Controller\Adminhtml\Lookbook\Checkproduct implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \MGS\Lookbook\Helper\Data $_helper, \Magento\Framework\Pricing\Helper\Data $_priceHelper, \Magento\Catalog\Api\ProductRepositoryInterface $productRepository)
    {
        $this->___init();
        parent::__construct($context, $_helper, $_priceHelper, $productRepository);
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
