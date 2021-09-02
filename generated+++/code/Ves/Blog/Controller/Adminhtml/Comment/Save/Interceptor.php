<?php
namespace Ves\Blog\Controller\Adminhtml\Comment\Save;

/**
 * Interceptor class for @see \Ves\Blog\Controller\Adminhtml\Comment\Save
 */
class Interceptor extends \Ves\Blog\Controller\Adminhtml\Comment\Save implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Magento\Framework\Filesystem $filesystem, \Magento\Backend\Helper\Js $jsHelper, \Magento\Backend\Model\Auth\Session $authSession)
    {
        $this->___init();
        parent::__construct($context, $filesystem, $jsHelper, $authSession);
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
