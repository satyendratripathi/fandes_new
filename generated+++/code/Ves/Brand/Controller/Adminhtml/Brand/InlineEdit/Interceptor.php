<?php
namespace Ves\Brand\Controller\Adminhtml\Brand\InlineEdit;

/**
 * Interceptor class for @see \Ves\Brand\Controller\Adminhtml\Brand\InlineEdit
 */
class Interceptor extends \Ves\Brand\Controller\Adminhtml\Brand\InlineEdit implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Magento\Cms\Api\PageRepositoryInterface $brandRepository, \Magento\Framework\Controller\Result\JsonFactory $jsonFactory, \Ves\Brand\Model\Brand $brandModel)
    {
        $this->___init();
        parent::__construct($context, $brandRepository, $jsonFactory, $brandModel);
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
