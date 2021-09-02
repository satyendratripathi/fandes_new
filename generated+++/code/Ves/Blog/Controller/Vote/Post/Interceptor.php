<?php
namespace Ves\Blog\Controller\Vote\Post;

/**
 * Interceptor class for @see \Ves\Blog\Controller\Vote\Post
 */
class Interceptor extends \Ves\Blog\Controller\Vote\Post implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Action\Context $context, \Magento\Store\Model\StoreManager $storeManager, \Magento\Framework\View\Result\PageFactory $resultPageFactory, \Ves\Blog\Helper\Data $blogHelper, \Ves\Blog\Model\Post $post, \Ves\Blog\Model\Vote $vote, \Magento\Framework\Controller\Result\ForwardFactory $resultForwardFactory, \Magento\Framework\Registry $registry, \Magento\Framework\App\Cache\TypeListInterface $cacheTypeList, \Magento\Customer\Model\Session $customerSession)
    {
        $this->___init();
        parent::__construct($context, $storeManager, $resultPageFactory, $blogHelper, $post, $vote, $resultForwardFactory, $registry, $cacheTypeList, $customerSession);
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
