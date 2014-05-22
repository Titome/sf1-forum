<?php

use J20\Uuid\Uuid;

class ForumMessage extends BaseForumMessage
{
    public function preInsert($event)
    {
        if (!$this->getUuid()) {
            $this->setUuid(Uuid::v4());
        }
    }

    public function setRawContent($content)
    {
        $this->_set('raw_content', $content);
        $this->_set('html_content', $content);
    }
}
