<?php
namespace MGS\Mpanel\Controller\Adminhtml\Mpanel\Install;

/**
 * Interceptor class for @see \MGS\Mpanel\Controller\Adminhtml\Mpanel\Install
 */
class Interceptor extends \MGS\Mpanel\Controller\Adminhtml\Mpanel\Install implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Magento\Config\Model\Config\Factory $configFactory, \Magento\Framework\Filesystem $filesystem, \Magento\Framework\Xml\Parser $parser, \Magento\Framework\Stdlib\StringUtils $string, \MGS\Mpanel\Helper\Data $themeHelper)
    {
        $this->___init();
        parent::__construct($context, $configFactory, $filesystem, $parser, $string, $themeHelper);
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
