<?php
namespace Ves\Testimonial\Controller\Testimonial\Form;

/**
 * Interceptor class for @see \Ves\Testimonial\Controller\Testimonial\Form
 */
class Interceptor extends \Ves\Testimonial\Controller\Testimonial\Form implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Action\Context $context, \Magento\Framework\View\Result\PageFactory $resultPageFactory, \Ves\Testimonial\Model\Testimonial $testimonialCollection, \Magento\Framework\Stdlib\DateTime\Timezone $stdTimezone, \Magento\Store\Model\StoreManager $storeManager, \Magento\Framework\Filesystem $filesystem, \Magento\Framework\HTTP\PhpEnvironment\RemoteAddress $remoteAddress, \Magento\Framework\App\Request\Http $httpRequest, \Ves\Testimonial\Helper\Data $helper)
    {
        $this->___init();
        parent::__construct($context, $resultPageFactory, $testimonialCollection, $stdTimezone, $storeManager, $filesystem, $remoteAddress, $httpRequest, $helper);
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
