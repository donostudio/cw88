<?php
/**
 * SFC - Featured Catagories Extension
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to support@storefrontconsulting.com so we can send you a copy immediately.
 *
 *
 * @package    SFC_FeaturedCategories
 * @copyright  (C)Copyright 2010 StoreFront Consulting, Inc (http://www.StoreFrontConsulting.com/)
 * @author     Garth Brantley
 *
 * History
 *  2010-05-12 - GHB - Rewriten to use Mage_Catalog_Model_Resource_Eav_Mysql4_Setup::addAttribute method
 *
 */

/* @var $installer Mage_Catalog_Model_Resource_Eav_Mysql4_Setup */

$installer = $this;

$installer->startSetup();
/**
 * Create table 'edm/group'
 */
$installer->run("DROP TABLE IF EXISTS `{$installer->getTable('edm/group')}`");
$table = $installer->getConnection()
    ->newTable($installer->getTable('edm/group'))
    ->addColumn('group_id', Varien_Db_Ddl_Table::TYPE_INTEGER, 10, array(
	        'identity'  => true,
	        'nullable'  => false,
	        'primary'   => true,
        ), 'Entity Id')
    ->addColumn('group_name', Varien_Db_Ddl_Table::TYPE_VARCHAR, 100, array(
    	'nullable'  => false,
        ), 'Group Name')
    ->addColumn('status', Varien_Db_Ddl_Table::TYPE_INTEGER, 2, array(
    	'nullable'  => false,
        ), 'Status 0 for disabled ,1 for enabled')
    ->addIndex($installer->getIdxName('edm/group', array('group_name')),
        array('group_name'))
    ->addIndex($installer->getIdxName('edm/group', array('group_id')),
        array('group_id'))
    ->setComment('Edm group');
$installer->getConnection()->createTable($table);
$installer->endSetup();