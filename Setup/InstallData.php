<?php

namespace MehdiKhalili\LinkedinProfileAttribute\Setup;

use Magento\Customer\Model\Customer;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Framework\Setup\{
    ModuleContextInterface,
    ModuleDataSetupInterface,
    InstallDataInterface
};

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;

/**
 * @codeCoverageIgnore
 */
class InstallData implements InstallDataInterface
{
    private $eavSetupFactory;

    public function __construct(EavSetupFactory $eavSetupFactory) {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $eavSetup = $this->eavSetupFactory->create();
        $eavSetup->addAttribute(Customer::ENTITY, 'linkedin_profile', [
            'type'     => 'varchar',
            'label'    => 'LinkedIn Profile',
            'input'    => 'url',
            'backend' => 'Training\Test\Model\Attribute\Backend\LinkedinProfile',
            'sort_order' => 79,
            'position' => 79,
            'visible'  => true,
            'required' => false,
            'global'   => ScopedAttributeInterface::SCOPE_GLOBAL,
            'group'    => 'General',
        ]);
    }
}
