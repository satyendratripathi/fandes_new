<?php
namespace Ves\Productlist\Block\Widget\Tab;

/**
 * Interceptor class for @see \Ves\Productlist\Block\Widget\Tab
 */
class Interceptor extends \Ves\Productlist\Block\Widget\Tab implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Catalog\Block\Product\Context $context, \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory, \Magento\Reports\Model\ResourceModel\Product\CollectionFactory $reportCollection, \Magento\Catalog\Model\Product\Visibility $catalogProductVisibility, \Magento\Framework\App\Http\Context $httpContext, \Magento\Rule\Model\Condition\Sql\Builder $sqlBuilder, \Magento\CatalogWidget\Model\Rule $rule, \Magento\Widget\Helper\Conditions $conditionsHelper, \Ves\Productlist\Model\Product $productModel, \Magento\Cms\Model\Block $blockModel, array $data = [])
    {
        $this->___init();
        parent::__construct($context, $productCollectionFactory, $reportCollection, $catalogProductVisibility, $httpContext, $sqlBuilder, $rule, $conditionsHelper, $productModel, $blockModel, $data);
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
