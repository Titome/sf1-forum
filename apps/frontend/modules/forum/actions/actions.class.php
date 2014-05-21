<?php

class forumActions extends sfActions
{
    /** @var ForumCategoryTable */
    private $categoryTable;

    public function preExecute()
    {
        $this->categoryTable = ForumCategoryTable::getInstance();
    }

    public function executeIndex()
    {
        $this->categories = $this->categoryTable->getRootCategories();
    }

    public function executeCategory(sfWebRequest $request)
    {
        $this->category = $this->categoryTable->getCategory($request->getParameter('category'));
        $this->forward404Unless($this->category);
    }
}
