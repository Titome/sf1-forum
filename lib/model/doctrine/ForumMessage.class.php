<?php

class ForumMessage extends BaseForumMessage
{
    public function setRawContent($content)
    {
        $this->_set('raw_content', $content);
        $this->_set('html_content', $content);
    }
}
