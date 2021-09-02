<?php
namespace Ves\Blog\Controller\Router;

/**
 * Interceptor class for @see \Ves\Blog\Controller\Router
 */
class Interceptor extends \Ves\Blog\Controller\Router implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\ActionFactory $actionFactory, \Magento\Framework\App\ResponseInterface $response, \Magento\Framework\Event\ManagerInterface $eventManager, \Magento\Store\Model\StoreManagerInterface $storeManager, \Ves\Blog\Helper\Data $blogHelper, \Ves\Blog\Model\Category $category, \Ves\Blog\Model\Post $post, \Ves\Blog\Model\Tag $tag, \Ves\Blog\Model\Author $author, \Magento\User\Model\UserFactory $userFactory, \Magento\Framework\Registry $registry)
    {
        $this->___init();
        parent::__construct($actionFactory, $response, $eventManager, $storeManager, $blogHelper, $category, $post, $tag, $author, $userFactory, $registry);
    }

    /**
     * {@inheritdoc}
     */
    public function match(\Magento\Framework\App\RequestInterface $request)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'match');
        return $pluginInfo ? $this->___callPlugins('match', func_get_args(), $pluginInfo) : parent::match($request);
    }
}
