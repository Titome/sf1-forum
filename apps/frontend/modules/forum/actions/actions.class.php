<?php

class forumActions extends sfActions
{
    /** @var ForumCategoryTable */
    private $categoryTable;

    /** @var ForumThreadTable */
    private $threadTable;

    /** @var ForumAnswerTable */
    private $answerTable;

    public function preExecute()
    {
        $this->categoryTable = ForumCategoryTable::getInstance();
        $this->threadTable   = ForumThreadTable::getInstance();
        $this->answerTable   = ForumAnswerTable::getInstance();
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

    public function executeThread(sfWebRequest $request)
    {
        $this->thread = $this->threadTable->getThread($request->getParameter('thread'));
        $this->forward404Unless($this->thread);

        $this->pager  = $this->answerTable->getPaginatedAnswers(
            $request->getGetParameter('page', 1),
            sfConfig::get('app_answers_max_per_page'),
            $this->thread
        );
        $this->answers = $this->pager->getResults();
    }

    public function executeIncrementThreadViews(sfWebRequest $request)
    {
        $this->forward404Unless($request->isXmlHttpRequest());

        $thread = $this->threadTable->getThread($request->getParameter('thread'));
        $this->forward404Unless($thread);

        $thread->incrementViewsCount();

        $response = $this->getResponse();
        $response->setContentType('application/json');
        $response->setContent(json_encode($thread->toArray(false)));

        return sfView::NONE;
    }
}
