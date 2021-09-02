<?php
namespace Ves\Testimonial\Controller\Adminhtml\Testimonial\Save;

/**
 * Interceptor class for @see \Ves\Testimonial\Controller\Adminhtml\Testimonial\Save
 */
class Interceptor extends \Ves\Testimonial\Controller\Adminhtml\Testimonial\Save implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Magento\Framework\Filesystem $filesystem, \Magento\Backend\Helper\Js $jsHelper, \Magento\Framework\App\Request\Http $httpRequest, \Magento\Framework\Stdlib\DateTime\Timezone $_stdTimezone)
    {
        $this->___init();
        parent::__construct($context, $filesystem, $jsHelper, $httpRequest, $_stdTimezone);
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
