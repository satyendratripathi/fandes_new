<?php
namespace MGS\Mpanel\Block\Catalog\Product\View\Gallery;

/**
 * Interceptor class for @see \MGS\Mpanel\Block\Catalog\Product\View\Gallery
 */
class Interceptor extends \MGS\Mpanel\Block\Catalog\Product\View\Gallery implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Catalog\Block\Product\Context $context, \Magento\Framework\Stdlib\ArrayUtils $arrayUtils, \Magento\Framework\Json\EncoderInterface $jsonEncoder, \MGS\Mpanel\Helper\Data $themeHelper, array $data = [])
    {
        $this->___init();
        parent::__construct($context, $arrayUtils, $jsonEncoder, $themeHelper, $data);
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
