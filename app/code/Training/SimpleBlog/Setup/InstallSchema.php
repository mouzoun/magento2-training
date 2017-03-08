<?php
namespace Training\SimpleBlog\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;
use Training\SimpleBlog\Api\Data\PostInterface;

/**
 * Class InstallSchema
 *
 * @package Training\SimpleBlog\Setup
 */

class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{
    /**
     * Installs DB schema for a module
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function install(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $setup->startSetup();

        /**
         * Create table 'blog_posts'
        */
        $table = $setup->getConnection()->newTable(
            $setup->getTable(PostInterface::BLOG_MAIN_TABLE)
        )->addColumn(
            PostInterface::POST_ID,
            Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'nullable' => false, 'primary' => true]
        )->addColumn(
            PostInterface::POST_TITLE,
            Table::TYPE_TEXT,
            255,
            []
        )->addColumn(
            PostInterface::POST_DESCRIPTION,
            Table::TYPE_TEXT,
            null,
            []
        )->addColumn(
            PostInterface::POST_CONTENT,
            Table::TYPE_TEXT,
            null,
            []
        )->addColumn(
            PostInterface::POST_DATE,
            Table::TYPE_TIMESTAMP,
            null,
            []
        );
        
        $setup->getConnection()->createTable($table);

        $setup->endSetup();
    }
    
}