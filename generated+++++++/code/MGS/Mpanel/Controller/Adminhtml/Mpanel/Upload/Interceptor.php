<?php
namespace MGS\Mpanel\Controller\Adminhtml\Mpanel\Upload;

/**
 * Interceptor class for @see \MGS\Mpanel\Controller\Adminhtml\Mpanel\Upload
 */
class Interceptor extends \MGS\Mpanel\Controller\Adminhtml\Mpanel\Upload implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Magento\Catalog\Model\ImageUploader $imageUploader)
    {
        $this->___init();
        parent::__construct($context, $imageUploader);
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
