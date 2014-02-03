<?php

class Occitech_Installer_Model_Resource_Setup extends Mage_Core_Model_Resource_Setup
{
    public function createAttributeSet($label, $parentAttributeSet = null)
    {
        $entityTypeId = Mage::getModel('eav/entity')
            ->setType('catalog_product')
            ->getTypeId();

        $AttributeSet = Mage::getModel('eav/entity_attribute_set');

        $AttributeSet->setEntityTypeId($entityTypeId)
            ->setAttributeSetName($label)
            ->save();

        if (null !== $parentAttributeSet) {
            $this->inheritFromParentAttributeSet($parentAttributeSet, $AttributeSet, $entityTypeId);
        }
    }

    private function inheritFromParentAttributeSet($parentAttributeSet, $AttributeSet, $entityTypeId)
    {
        $parentAttributeId = $AttributeSet->getCollection()
            ->addFieldToFilter('entity_type_id', array('eq' => $entityTypeId))
            ->addFieldToFilter('attribute_set_name', array('eq' => $parentAttributeSet))
            ->getFirstItem()
            ->getAttributeSetId();
        $AttributeSet->initFromSkeleton($parentAttributeId)
            ->save();
    }
}
