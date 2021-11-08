<?php
namespace Zero1\ShippingTermsAndConditions\Block\Adminhtml\Form\Field;
 
use Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray;
use Magento\Framework\DataObject;
use Magento\Framework\Exception\LocalizedException;
 
class Patterns extends AbstractFieldArray
{
    protected $renderer;

    protected function _prepareToRender()
    {
        $this->addColumn('pattern', ['label' => __('Pattern'), 'class' => 'required-entry']);
        $this->addColumn('modifiers', ['label' => __('Modifiers'), 'class' => '']);
        $this->addColumn('message', ['label' => __('Message'), 'class' => '']);
        $this->addColumn('has_checkbox', ['label' => __('Has Checkbox'), 'class' => '', 'renderer' => $this->getSelectRenderer()]);
        $this->addColumn('label', ['label' => __('Label'), 'class' => '']);
        
        $this->_addAfter = false;
        $this->_addButtonLabel = __('Add');
    }

    protected function getSelectRenderer()
    {
        if(!$this->renderer){
            $this->renderer = $this->getLayout()->createBlock(
                \Zero1\ShippingTermsAndConditions\Block\Adminhtml\Form\Field\Select::class,
                '',
                ['data' => ['is_render_to_js_template' => true]]
            );
        }
        return $this->renderer;
    }

    /**
     * Prepare existing row data object
     *
     * @param \Magento\Framework\DataObject $row
     * @return void
     */
    protected function _prepareArrayRow(\Magento\Framework\DataObject $row)
    {
        $optionExtraAttr = [];
        $optionExtraAttr['option_' . $this->getSelectRenderer()->calcOptionHash($row->getData('has_checkbox'))] =
            'selected="selected"';
        $row->setData(
            'option_extra_attrs',
            $optionExtraAttr
        );
    }
}