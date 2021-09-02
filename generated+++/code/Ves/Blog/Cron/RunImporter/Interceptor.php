<?php
namespace Ves\Blog\Cron\RunImporter;

/**
 * Interceptor class for @see \Ves\Blog\Cron\RunImporter
 */
class Interceptor extends \Ves\Blog\Cron\RunImporter implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Ves\Blog\Helper\Data $helper, \Ves\Blog\Model\ResourceModel\Importer\CollectionFactory $importerCollectionFactory, \Ves\Blog\Model\ImporterLogFactory $importerLogFactory)
    {
        $this->___init();
        parent::__construct($context, $helper, $importerCollectionFactory, $importerLogFactory);
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
