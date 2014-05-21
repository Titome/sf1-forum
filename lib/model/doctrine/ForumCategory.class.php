<?php

class ForumCategory extends BaseForumCategory
{
    public function getLastMessage()
    {
        
    }

    public function getLastAuthor()
    {
        if ($message = $this->getLastMessage()) {
            return $message->getAuthor();
        }
    }

    public function enable()
    {
        if (!$this->isEnabled()) {
            $this->_set('enabled', true);
        }
    }

    public function disable()
    {
        if ($this->isEnabled()) {
            $this->_set('enabled', false);
        }
    }

    public function isEnabled()
    {
        return $this->_get('enabled');
    }
}
