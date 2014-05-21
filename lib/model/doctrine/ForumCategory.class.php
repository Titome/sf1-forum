<?php

class ForumCategory extends BaseForumCategory
{
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
