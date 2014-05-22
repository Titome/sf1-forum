<?php

use Ciconia\Ciconia;
use Ciconia\Extension\Gfm;
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
        $ciconia = new Ciconia();
        $ciconia->addExtension(new Gfm\FencedCodeBlockExtension());
        $ciconia->addExtension(new Gfm\TaskListExtension());
        $ciconia->addExtension(new Gfm\InlineStyleExtension());
        $ciconia->addExtension(new Gfm\WhiteSpaceExtension());
        $ciconia->addExtension(new Gfm\TableExtension());
        $ciconia->addExtension(new Gfm\UrlAutoLinkExtension());

        $this->_set('raw_content', $content);
        $this->_set('html_content', $ciconia->render($content));
    }
}
