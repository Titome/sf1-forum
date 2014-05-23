<?php

require_once dirname(__FILE__) . '/../../sfDatabaseTestCase.php';

class ForumCategoryTest extends sfDatabaseTestCase
{
    public function testEnableAndDisable()
    {
        $category = $this->getTable()->getCategory('symfony-framework');

        $category->disable();
        $this->assertFalse($category->isEnabled());

        $category->enable();
        $this->assertTrue($category->isEnabled());
    }

    private function getTable()
    {
        return ForumCategoryTable::getInstance();
    }
}
