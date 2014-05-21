<?php

class forumActions extends sfActions
{
    public function executeIndex()
    {
        $table = ForumCategoryTable::getInstance();

        $this->categories = $table->getRootCategories();
    }

    public function executeCategory(sfWebRequest $request)
    {
        $this->category = $request->getParameter('category');
    }
}
