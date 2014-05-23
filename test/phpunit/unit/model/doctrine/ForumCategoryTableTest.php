<?php

require_once dirname(__FILE__) . '/../../sfDatabaseTestCase.php';

class ForumCategoryTableTest extends sfDatabaseTestCase
{
    /** @var ForumCategoryTable */
    private $table;

    public function testGetRootCategories()
    {
        $this->assertCount(2, $this->table->getRootCategories());
    }

    /** @dataProvider provideSlugs */
    public function testGetThreadCount($slug, $nbExpectedThreads)
    {
        $category = $this->table->getCategory($slug);
 
        $this->assertSame($nbExpectedThreads, $this->table->getThreadCount($category));
    }

    public function provideSlugs()
    {
        return array(
            array('symfony-framework', 12),
            array('php-programming', 13),
            array('web-programming', 13),
            array('arts', 1),
            array('forums', 14),
        );
    }
    
    public function testGetCategory()
    {
        $this->assertInstanceOf('ForumCategory', $this->table->getCategory('symfony-framework'));
        $this->assertFalse($this->table->getCategory('foo'));
        $this->assertFalse($this->table->getCategory(''));
    }

    protected function _start()
    {
        parent::_start();
        $this->table = ForumCategoryTable::getInstance();
    }

    protected function _end()
    {
        $this->table = null;
        parent::_end();
    }
}
