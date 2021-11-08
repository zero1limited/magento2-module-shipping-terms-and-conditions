<?php
namespace Zero1\ShippingTermsAndConditions\Model;

use Magento\Checkout\Model\ConfigProviderInterface;
use \Magento\Framework\App\Config\ScopeConfigInterface;

class CheckoutConfigProvider implements ConfigProviderInterface
{
    const CONFIG_PATH_ENABLE = 'shipping/zero1_shipping_terms_and_conditions/enable';
    const CONFIG_PATH_PATTERNS = 'shipping/zero1_shipping_terms_and_conditions/patterns';

    /** ScopeConfigInterface */
    protected $scopeConfig;

    /**
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig
    ){
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * {@inheritdoc}
     */
    public function getConfig()
    {
        return [ 'Zero1_ShippingTermsAndConditions' => [
            'enable' => (bool)$this->getConfigValue(self::CONFIG_PATH_ENABLE, false),
            'patterns' => json_decode($this->getConfigValue(self::CONFIG_PATH_PATTERNS, '{}'), true),
        ]];
    }

    protected function getConfigValue($path, $default = '')
    {
        $value = $this->scopeConfig->getValue($path);
        if($value === null){
            $value = $default;
        }
        return $value;
    }
}
