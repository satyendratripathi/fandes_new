<?php
/**
 * Data
 *
 * @copyright Copyright © 2020 Lof. All rights reserved.
 * @author    @copyright Copyright (c) 2014 Lof (<https://www.lof.com>)
 * @license <https://www.lof.com/license-agreement.html>
 * @Author: lof<support@lof.com>
 * @github: <https://github.com/lof>
 */

namespace Lof\RecentlyViewed\Helper;
use Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper
{
    protected $configModule;

    public function __construct(
        \Magento\Framework\App\Helper\Context $context
    )
    {
        parent::__construct($context);
        $this->configModule = $this->getConfig(strtolower($this->_getModuleName()));
    }

    public function getConfig($cfg='')
    {
        if($cfg) return $this->scopeConfig->getValue( $cfg, \Magento\Store\Model\ScopeInterface::SCOPE_STORE );
        return $this->scopeConfig;
    }

    public function getConfigModule($cfg='', $value=null)
    {
        $values = $this->configModule;
        if( !$cfg ) return $values;
        $config  = explode('/', $cfg);
        $end     = count($config) - 1;
        foreach ($config as $key => $vl) {
            if( isset($values[$vl]) ){
                if( $key == $end ) {
                    $value = $values[$vl];
                }else {
                    $values = $values[$vl];
                }
            }

        }
        return $value;
    }

}
