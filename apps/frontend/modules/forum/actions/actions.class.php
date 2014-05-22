<?php

class forumActions extends sfActions
{
    /** @var ForumCategoryTable */
    private $categoryTable;

    /** @var ForumThreadTable */
    private $threadTable;

    public function preExecute()
    {
        $this->categoryTable = ForumCategoryTable::getInstance();
        $this->threadTable   = ForumThreadTable::getInstance();
    }

    public function executeIndex()
    {
        $this->categories = $this->categoryTable->getRootCategories();
    }

    public function executeCategory(sfWebRequest $request)
    {
        $this->category = $this->categoryTable->getCategory($request->getParameter('category'));
        $this->forward404Unless($this->category);

        $this->pager  = $this->threadTable->getPaginatedThreads(
            $request->getGetParameter('page', 1),
            sfConfig::get('app_threads_max_per_page'),
            $this->category
        );
        $this->threads = $this->pager->getResults();
    }
}
