<?php

class ForumThreadForm extends BaseForumThreadForm
{
    public function configure()
    {
        $this->useFields(array('title', 'raw_content'));
    }
}
