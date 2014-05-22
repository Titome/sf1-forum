<?php

class ForumThread extends BaseForumThread
{
    public function isSolved()
    {
        return $this->_get('solved');
    }

    public function isClosed()
    {
        return $this->_get('closed');
    }

    public function incrementAnswerCount()
    {
        $count = (int) $this->getAnswerCount();
        $this->setAnswerCount($count + 1);
        $this->save();
    }
}
