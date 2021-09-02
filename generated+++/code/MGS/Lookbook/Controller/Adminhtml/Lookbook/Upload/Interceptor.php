<?php
namespace MGS\Lookbook\Controller\Adminhtml\Lookbook\Upload;

/**
 * Interceptor class for @see \MGS\Lookbook\Controller\Adminhtml\Lookbook\Upload
 */
class Interceptor extends \MGS\Lookbook\Controller\Adminhtml\Lookbook\Upload implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig, \MGS\Lookbook\Model\Uploadedfilexhr $uploadXhr, \MGS\Lookbook\Helper\Data $helper, \Magento\Framework\Filesystem\Driver\File $file, \Magento\Framework\Image\AdapterFactory $imageFactory, \MGS\Lookbook\Model\Uploadedfileform $uploadfileForm)
    {
        $this->___init();
        parent::__construct($context, $scopeConfig, $uploadXhr, $helper, $file, $imageFactory, $uploadfileForm);
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
