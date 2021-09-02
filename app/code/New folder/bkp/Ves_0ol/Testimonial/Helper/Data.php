<?php
/**
 * Venustheme
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the venustheme.com license that is
 * available through the world-wide-web at this URL:
 * http://venustheme.com/license
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category  Venustheme
 * @package   Ves_Testimonial
 * @copyright Copyright (c) 2017 Landofcoder (http://www.venustheme.com/)
 * @license   http://www.venustheme.com/LICENSE-1.0.html
 */

namespace Ves\Testimonial\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    /**
     * @var \Magento\Framework\ObjectManagerInterface
     */
    protected $_objectManager;
    /**
     * @var \Magento\Framework\View\Element\BlockFactory
     */
    protected $_blockFactory;
    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $_storeManager;

    protected $_scopeConfig;

    /**
     * @var \Magento\Framework\Stdlib\DateTime\TimezoneInterface
     */
    protected $_localeDate;

    const SHOW_NAME            = 'testimonial/general/testimonial_show_name';
    const SHOW_EMAIL           = 'testimonial/general/testimonial_show_email';
    const SHOW_WEBSITE_COMPANY = 'testimonial/general/testimonial_show_website_company';
    const SHOW_TITLE           = 'testimonial/general/testimonial_show_title';
    const SHOW_TESTIMONIAL     = 'testimonial/general/testimonial_show_testimonial';
    const SHOW_PLACEON         = 'testimonial/general/testimonial_show_placeon';
    const STYLE = 'testimonial/general/testimonial_style';
    const RECAPTCHA_SITE_KEY   = 'testimonial/general/recaptcha_site_key';
    const RECAPTCHA_SECRET_KEY = 'testimonial/general/recaptcha_secret_key';


    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Framework\View\Element\BlockFactory $blockFactory,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Cms\Model\Template\FilterProvider $filterProvider,
        \Magento\Framework\ObjectManagerInterface $objectManager,
        \Magento\Framework\Stdlib\DateTime\TimezoneInterface $localeDate
    ) {
        parent::__construct($context);
        $this->_localeDate     = $localeDate;
        $this->_scopeConfig    = $context->getScopeConfig();
        $this->_blockFactory   = $blockFactory;
        $this->_storeManager   = $storeManager;
        $this->_filterProvider = $filterProvider;
        $this->_objectManager  = $objectManager;

    }//end __construct()


    public function getShowName()
    {
        return $this->_scopeConfig->getValue(self::SHOW_NAME);

    }//end getShowName()


    public function getShowEmail()
    {
        return $this->_scopeConfig->getValue(self::SHOW_EMAIL);

    }//end getShowEmail()


    public function getShowWebsiteCompany()
    {
        return $this->_scopeConfig->getValue(self::SHOW_WEBSITE_COMPANY);

    }//end getShowWebsiteCompany()


    public function getShowTitle()
    {
        return $this->_scopeConfig->getValue(self::SHOW_TITLE);

    }//end getShowTitle()


    public function getShowTestimonial()
    {
        return $this->_scopeConfig->getValue(self::SHOW_TESTIMONIAL);

    }//end getShowTestimonial()


    public function getShowPlaceOn()
    {
        return $this->_scopeConfig->getValue(self::SHOW_PLACEON);

    }//end getShowPlaceOn()


    public function getStyle()
    {
        return $this->_scopeConfig->getValue(self::STYLE);

    }//end getStyle()


    public function getCaptchaSiteKey()
    {
        return $this->_scopeConfig->getValue(self::RECAPTCHA_SITE_KEY);

    }//end getCaptchaSiteKey()


    public function getCaptchaSecretKey()
    {
        return $this->_scopeConfig->getValue(self::RECAPTCHA_SECRET_KEY);

    }//end getCaptchaSecretKey()


    public function getConfig($key,$default = null, $store = null)
    {
        if(!empty($default)) {
            return $default;
        }

        $store     = $this->_storeManager->getStore($store);
        $websiteId = $store->getWebsiteId();

        $result = $this->scopeConfig->getValue(
            'testimonial/'.$key,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
            $store
        );
        return $result;

    }//end getConfig()


    public function formatDate(
        $date = null,
        $format = \IntlDateFormatter::SHORT,
        $showTime = false,
        $timezone = null
    ) {
        $date = $date instanceof \DateTimeInterface ? $date : new \DateTime($date);
        return $this->_localeDate->formatDateTime(
            $date,
            $format,
            $showTime ? $format : \IntlDateFormatter::NONE,
            null,
            $timezone
        );

    }//end formatDate()


    public function getFormatDate($date, $type = 'full')
    {
        $result = '';
        switch ($type) {
        case 'full':
            $result = $this->formatDate($date, \IntlDateFormatter::FULL);
            break;
        case 'long':
            $result = $this->formatDate($date, \IntlDateFormatter::LONG);
            break;
        case 'medium':
            $result = $this->formatDate($date, \IntlDateFormatter::MEDIUM);
            break;
        case 'short':
            $result = $this->formatDate($date, \IntlDateFormatter::SHORT);
            break;
        }

        return $result;

    }//end getFormatDate()


    public function subString( $text, $length = 100, $replacer ='...', $is_striped=true )
    {
        if($length == 0) { return $text;
        }

        $text = ($is_striped == true) ? strip_tags($text) : $text;
        if(strlen($text) <= $length) {
            return $text;
        }

        $text      = substr($text, 0, $length);
        $pos_space = strrpos($text, ' ');
        return substr($text, 0, $pos_space).$replacer;

    }//end subString()


    public function filter($str)
    {
        $html = $this->_filterProvider->getPageFilter()->filter($str);
        return $html;

    }//end filter()


    public function getMediaUrl()
    {
        $storeMediaUrl = $this->_objectManager->get('Magento\Store\Model\StoreManagerInterface')
            ->getStore()
            ->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
        return $storeMediaUrl;

    }//end getMediaUrl()


}//end class
