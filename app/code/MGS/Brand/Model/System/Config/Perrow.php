<?php

namespace MGS\Brand\Model\System\Config;

use Magento\Framework\Option\ArrayInterface;

class Perrow implements ArrayInterface
{
    public function toOptionArray()
    {
        return [
            [ 'value' => '1', 'label' => __('1') ],
			[ 'value' => '2', 'label' => __('2') ],
			[ 'value' => '3', 'label' => __('3') ],
			[ 'value' => '4', 'label' => __('4') ],
			[ 'value' => '5', 'label' => __('5') ],
			[ 'value' => '6', 'label' => __('6') ],
			[ 'value' => '7', 'label' => __('7') ],
			[ 'value' => '7', 'label' => __('8') ]
        ];
    }

}
