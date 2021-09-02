<?php
namespace MGS\Mpanel\Controller\Adminhtml\Mpanel\Import;

/**
 * Interceptor class for @see \MGS\Mpanel\Controller\Adminhtml\Mpanel\Import
 */
class Interceptor extends \MGS\Mpanel\Controller\Adminhtml\Mpanel\Import implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Magento\Config\Model\Config\Factory $configFactory, \Magento\Framework\Filesystem $filesystem, \Magento\Framework\Xml\Parser $parser, \Magento\Store\Model\StoreManagerInterface $storeManager, \Magento\Framework\Stdlib\StringUtils $string, \MGS\Mpanel\Helper\Data $_themeHelper, \Magento\Framework\View\Element\Context $urlContext, \MGS\Mpanel\Model\ResourceModel\Section\CollectionFactory $sectionFactory, \MGS\Mpanel\Model\ResourceModel\Childs\CollectionFactory $childsFactory)
    {
        $this->___init();
        parent::__construct($context, $configFactory, $filesystem, $parser, $storeManager, $string, $_themeHelper, $urlContext, $sectionFactory, $childsFactory);
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
