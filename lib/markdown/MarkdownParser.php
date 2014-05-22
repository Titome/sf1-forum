<?php

use Ciconia\Ciconia;
use Ciconia\Renderer\RendererInterface;
use Ciconia\Extension\Gfm;

class MarkdownParser extends Ciconia
{
    public function __construct(RendererInterface $renderer = null)
    {
        parent::__construct($renderer);

        $this->addExtension(new Gfm\FencedCodeBlockExtension());
        $this->addExtension(new Gfm\TaskListExtension());
        $this->addExtension(new Gfm\InlineStyleExtension());
        $this->addExtension(new Gfm\WhiteSpaceExtension());
        $this->addExtension(new Gfm\TableExtension());
        $this->addExtension(new Gfm\UrlAutoLinkExtension());
    }
} 
