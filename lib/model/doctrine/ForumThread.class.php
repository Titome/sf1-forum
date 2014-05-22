<?php

class ForumThread extends BaseForumThread
{
    public function getCategoriesTree()
    {
        $board  = $this->getBoard();
        $boards = $board->getParents();
        $boards[] = $board;

        return $boards;
    }

    public function isSolved()
    {
        return $this->_get('solved');
    }

    public function isClosed()
    {
        return $this->_get('closed');
    }

    public function incrementViewsCount($step = 1)
    {
        $count = (int) $this->getViewsCount();
        $this->setViewsCount($count + $step);
        $this->save();
    }

    public function incrementAnswerCount($step = 1)
    {
        $count = (int) $this->getAnswerCount();
        $this->setAnswerCount($count + $step);
        $this->save();
    }
}
