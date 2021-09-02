<?php
namespace MGS\Blog\Controller\Post\Comment;

/**
 * Interceptor class for @see \MGS\Blog\Controller\Post\Comment
 */
class Interceptor extends \MGS\Blog\Controller\Post\Comment implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Action\Context $context, \Magento\Customer\Model\Session $customerSession, \Magento\Store\Model\StoreManagerInterface $storeManager, \MGS\Blog\Helper\Data $blogHelper, \MGS\Blog\Model\Comment $comment, \Magento\Framework\Mail\Template\TransportBuilder $transportBuilder)
    {
        $this->___init();
        parent::__construct($context, $customerSession, $storeManager, $blogHelper, $comment, $transportBuilder);
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
