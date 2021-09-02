<?php
namespace Ves\Productlist\Block\Widget\CategoryTab;

/**
 * Interceptor class for @see \Ves\Productlist\Block\Widget\CategoryTab
 */
class Interceptor extends \Ves\Productlist\Block\Widget\CategoryTab implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Catalog\Block\Product\Context $context, \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory, \Magento\Reports\Model\ResourceModel\Product\CollectionFactory $reportCollection, \Magento\Catalog\Model\Product\Visibility $catalogProductVisibility, \Magento\Framework\App\Http\Context $httpContext, \Ves\Productlist\Model\Product $productModel, \Magento\Cms\Model\Block $blockModel, \Magento\Catalog\Model\Category $categoryModel, array $data = [])
    {
        $this->___init();
        parent::__construct($context, $productCollectionFactory, $reportCollection, $catalogProductVisibility, $httpContext, $productModel, $blockModel, $categoryModel, $data);
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
