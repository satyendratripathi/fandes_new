<?php
namespace Ves\Megamenu\Block\Widget\Products;

/**
 * Interceptor class for @see \Ves\Megamenu\Block\Widget\Products
 */
class Interceptor extends \Ves\Megamenu\Block\Widget\Products implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Catalog\Block\Product\Context $context, \Ves\Megamenu\Model\Product $productModel, \Magento\Framework\App\Http\Context $httpContext, array $data = [])
    {
        $this->___init();
        parent::__construct($context, $productModel, $httpContext, $data);
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
