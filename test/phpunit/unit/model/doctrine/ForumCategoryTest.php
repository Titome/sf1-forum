<?php

require_once dirname(__FILE__) . '/../../../sfDatabaseTestCase.php';

class ForumCategoryTest extends sfDatabaseTestCase
{
    public function testGetNoChildrenPks()
    {
        $category = $this->createCategory('foo');

        $this->assertCount(0, $category->getChildrenPks());
    }

    /*public function testGetChildrenPks()
    {
        $categoryA = $this->createCategory('a');
        $categoryB = $this->createCategory('b');
        $categoryC = $this->createCategory('c');

        $categoryB->getNode()->insertAsFirstChildOf($categoryA);
        $categoryC->getNode()->insertAsFirstChildOf($categoryA);

        $categoryA->save();
        $categoryB->save();
        $categoryC->save();
        
        $this->assertCount(2, $categoryA->getChildrenPks());
    }*/

    public function testEnableAndDisable()
    {
        $category = $this->createCategory('foo');

        $category->disable();
        $this->assertFalse($category->isEnabled());

        $category->enable();
        $this->assertTrue($category->isEnabled());
    }

    private function createCategory($name)
    {
        $category = new ForumCategory();
        $category->setName($name);
        $category->save();

        return $category;
    }
}
