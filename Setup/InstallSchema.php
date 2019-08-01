<?php

namespace Challenges\Todo\Setup;

use Magento\Framework\DB\Adapter\AdapterInterface;
use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Zend_Db_Exception;

class InstallSchema implements InstallSchemaInterface
{
    const TODO_TABLE = 'challenges_todo';

    /**
     * Upgrades DB schema for a module
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     * @throws Zend_Db_Exception
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $this->createTodoTable($setup);
        $setup->endSetup();
    }

    /**
     * Create Todo table
     *
     * @param SchemaSetupInterface $setup
     * @throws Zend_Db_Exception
     * @return void
     */
    private function createTodoTable(SchemaSetupInterface $setup)
    {
//        if ($setup->tableExists(self::TODO_TABLE)) {
//            return;
//        }
//
        $tableName = $setup->getTable(self::TODO_TABLE);
        $connection = $setup->getConnection();

        $table = $connection->newTable($tableName);

        $table->addColumn('id', Table::TYPE_INTEGER, null, [
            'identity' => true,
            'nullable' => false,
            'primary'  => true,
            'unsigned' => true
        ]);
        $table->addColumn('task', Table::TYPE_TEXT, 255, [
            'nullable' => false
        ]);

        $connection->createTable($table);
    }
}
