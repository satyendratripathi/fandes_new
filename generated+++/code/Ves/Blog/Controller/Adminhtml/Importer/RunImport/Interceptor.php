<?php
namespace Ves\Blog\Controller\Adminhtml\Importer\RunImport;

/**
 * Interceptor class for @see \Ves\Blog\Controller\Adminhtml\Importer\RunImport
 */
class Interceptor extends \Ves\Blog\Controller\Adminhtml\Importer\RunImport implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Magento\Framework\View\Result\PageFactory $resultPageFactory, \Magento\Framework\Registry $registry, \Ves\Blog\Model\ImporterFactory $importerFactory, \Ves\Blog\Model\ImporterLogFactory $importerLogFactory)
    {
        $this->___init();
        parent::__construct($context, $resultPageFactory, $registry, $importerFactory, $importerLogFactory);
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
