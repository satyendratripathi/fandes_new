<?php
namespace Ves\Themesettings\Controller\Cart\Index;

/**
 * Interceptor class for @see \Ves\Themesettings\Controller\Cart\Index
 */
class Interceptor extends \Ves\Themesettings\Controller\Cart\Index implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Action\Context $context, \Magento\Checkout\Model\Cart $cart, \Magento\Checkout\Helper\Data $helperData, \Magento\Framework\Locale\ResolverInterface $resolver, \Magento\Checkout\CustomerData\Cart $cutomerCart, \Magento\Checkout\Model\Session $checkoutSession, \Magento\Catalog\Model\ResourceModel\Url $catalogUrl, \Magento\Checkout\Model\Cart $checkoutCart, \Magento\Checkout\CustomerData\ItemPoolInterface $itemPoolInterface)
    {
        $this->___init();
        parent::__construct($context, $cart, $helperData, $resolver, $cutomerCart, $checkoutSession, $catalogUrl, $checkoutCart, $itemPoolInterface);
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
