<?php

class ForumAnswer extends BaseForumAnswer
{
    public function postInsert($event)
    {
        if (!$thread = $this->getThread()) {
            throw new RuntimeException(
                'Answer must be linked to a thread '.
                'to update thread answer count.'
            );
        }
        
        $thread->incrementAnswerCount();
    }
}
