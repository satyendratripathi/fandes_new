<?php
namespace MGS\Mpanel\Controller\Adminhtml\Mpanel\Export;

/**
 * Interceptor class for @see \MGS\Mpanel\Controller\Adminhtml\Mpanel\Export
 */
class Interceptor extends \MGS\Mpanel\Controller\Adminhtml\Mpanel\Export implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Magento\Config\Model\ResourceModel\Config\Data\CollectionFactory $config, \MGS\Mpanel\Model\ResourceModel\Section\CollectionFactory $sectionFactory, \MGS\Mpanel\Model\ResourceModel\Childs\CollectionFactory $blockFactory, \MGS\Promobanners\Model\ResourceModel\Promobanners\CollectionFactory $bannerFactory, \Magento\Framework\Filesystem $filesystem, \Magento\Framework\Filesystem\Io\File $ioFile, \MGS\Mpanel\Helper\Data $_themeHelper)
    {
        $this->___init();
        parent::__construct($context, $config, $sectionFactory, $blockFactory, $bannerFactory, $filesystem, $ioFile, $_themeHelper);
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
