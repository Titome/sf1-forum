<?php

class forumActions extends sfActions
{
    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request)
    {
    
    }

    public function executeCategory(sfWebRequest $request)
    {
        $this->category = $request->getParameter('category');
    }
}
