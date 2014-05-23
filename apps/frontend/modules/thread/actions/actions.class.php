<?php

class threadActions extends sfActions
{
    /** @var ForumCategoryTable */
    private $categoryTable;

    public function preExecute()
    {
        $this->categoryTable = ForumCategoryTable::getInstance();
    }

    public function executeNewThread(sfWebRequest $request)
    {
        $this->category = $this->categoryTable->getCategory($request->getGetParameter('board'));
        $this->forward404Unless($this->category);

        $this->thread = $this->category->openThread($this->getGuardUser());
        $this->form = new ForumThreadForm($this->thread);
        if ($request->isMethod('POST')) {
            $this->form->bind($request->getPostParameter($this->form->getName()));
            if ($this->form->isValid()) {
                $this->form->save();
                $this->redirect($this->generateUrl('forum_thread', array('thread' => $this->thread->getSlug())));
            }
        }
    }

    private function getGuardUser()
    {
        return $this->getUser()->getGuardUser();
    }
}
