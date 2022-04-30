<?php
declare(strict_types=1);

namespace MehdiKhalili\LinkedinProfileAttribute\Model\Attribute\Backend;

use Magento\Customer\Model\Customer;
use Magento\Eav\Model\Entity\Attribute\Backend\AbstractBackend;
use Magento\Framework\Exception\LocalizedException;

/**
 * LinkedIn Profile attribute backend
 */
class LinkedinProfile extends AbstractBackend
{
    /**
     * Validate
     * @param Customer $object
     * @throws LocalizedException
     * @return bool
     */
    public function validate($object): bool
    {
        parent::validate($object);

        $value = $object->getData($this->getAttribute()->getAttributeCode());
        if (count($value) > 250) {
            throw new LocalizedException(
                __('Url cannot have more than 250 characters.')
            );
        }
        return true;
    }

    /**
     * Before save
     *
     * @param Customer $object
     * @return $this
     * @throws LocalizedException
     */
    public function beforeSave($object): self
    {
        $this->validate($object);

        return parent::beforeSave($object);
    }
}
