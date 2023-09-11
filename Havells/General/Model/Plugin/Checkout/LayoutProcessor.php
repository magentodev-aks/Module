<?php
namespace Havells\General\Model\Plugin\Checkout;
class LayoutProcessor
{
    /**
     * @param \Magento\Checkout\Block\Checkout\LayoutProcessor $subject
     * @param array $jsLayout
     * @return array
     */
    public function afterProcess(
        \Magento\Checkout\Block\Checkout\LayoutProcessor $subject,
        array  $jsLayout
    ) {
        $customAttributeCode = 'address_type';
        $customField = [
            'component' => 'Magento_Ui/js/form/element/checkbox-set',
            'config' => [
                // customScope is used to group elements within a single form (e.g. they can be validated separately)
                'customScope' => 'shippingAddress.address_type',
                'customEntry' => null,
                'template' => 'ui/form/field',
                'elementTmpl' => 'ui/form/element/checkbox-set',
                'tooltip' => [
                    'description' => 'Address Type',
                ],
            ],
            'dataScope' => 'shippingAddress.address_type_attribute'. $customAttributeCode,
            'label' => 'Address Type',
            'provider' => 'checkoutProvider',
            'validation' => [
               'required-entry' => true
            ],
            'options' => [
                [
                    'value' => '1',
                    'label' => 'Home'
                ],
                [
                    'value' => '2',
                    'label' => 'Work'
                ],
                [
                    'value' => '3',
                    'label' => 'Neighbour'
                ]
                ],
                'filterBy' => null,
                'customEntry' => null,
                'visible' => true,
                'value' => '' // value field is used to set a default value of the attribute
                ]; 

        $jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']
        ['shippingAddress']['children']['shipping-address-fieldset']['children'][$customAttributeCode] = $customField;
        
        return $jsLayout;
    }
}