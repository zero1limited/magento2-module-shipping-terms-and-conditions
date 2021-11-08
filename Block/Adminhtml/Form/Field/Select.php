<?php
namespace Zero1\ShippingTermsAndConditions\Block\Adminhtml\Form\Field;
 
class Select extends \Magento\Framework\View\Element\Html\Select
{ 
    public function getOptions()
    {
        return [
            ['value' => 'yes', 'label' => 'Yes'],
            ['value' => 'no', 'label' => 'No'],
        ];
    }
 
    public function setInputName($value)
    {
        return $this->setName($value);
    }
}
