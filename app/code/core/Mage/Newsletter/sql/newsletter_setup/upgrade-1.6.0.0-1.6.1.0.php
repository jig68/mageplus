<?php
/**
 * Mage+
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@mageplus.org so we can send you a copy immediately.
 *
 * @category    Mage
 * @package     Mage_Newsletter
 * @copyright   Copyright (c) 2012 Mage+ (http://www.mageplus.org) 
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/** @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;
$installer->startSetup();

$installer->getConnection()
    ->addTrigger($installer->getTable('newsletter/template'), 'trig_' . $installer->getTable('newsletter/template') . '_created',
                  'FOR EACH ROW SET NEW.added_at = CURRENT_TIMESTAMP',
                  Varien_Db_Adapter_Interface::TRIGGER_TIME_BEFORE, Varien_Db_Adapter_Interface::EVENT_TYPE_INSERT);

$installer->getConnection()
    ->addTrigger($installer->getTable('newsletter/template'), 'trig_' . $installer->getTable('newsletter/template') . '_updated',
                  'FOR EACH ROW SET NEW.modified_at = CURRENT_TIMESTAMP, NEW.added_at = OLD.added_at',
                  Varien_Db_Adapter_Interface::TRIGGER_TIME_BEFORE, Varien_Db_Adapter_Interface::EVENT_TYPE_UPDATE);

$installer->endSetup();