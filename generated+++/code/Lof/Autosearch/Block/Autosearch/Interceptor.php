<?php
namespace Lof\Autosearch\Block\Autosearch;

/**
 * Interceptor class for @see \Lof\Autosearch\Block\Autosearch
 */
class Interceptor extends \Lof\Autosearch\Block\Autosearch implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Catalog\Block\Product\Context $context, \Magento\Customer\Model\Session $customerSession, \Magento\Catalog\Model\CategoryFactory $categoryFactory, \Magento\Search\Model\ResourceModel\Query\CollectionFactory $queryCollectionFactory, \Lof\Autosearch\Helper\Data $autosearchHelper, array $data = [])
    {
        $this->___init();
        parent::__construct($context, $customerSession, $categoryFactory, $queryCollectionFactory, $autosearchHelper, $data);
    }

    /**
     * {@inheritdoc}
     */
    public function getImage($product, $imageId, $attributes = [])
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getImage');
        return $pluginInfo ? $this->___callPlugins('getImage', func_get_args(), $pluginInfo) : parent::getImage($product, $imageId, $attributes);
    }
}
