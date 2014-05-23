<?php

class ForumCategory extends BaseForumCategory
{
    public function getParentRoot()
    {
        /** @var Doctrine_Node_NestedSet $node */
        $node = $this->getNode();
        if ($node->isRoot()) {
            return $this;
        }

        $ancestors = $this->getAncestors();

        return array_pop($ancestors);
    }

    public function getChildrenPks()
    {
        $node = $this->getNode();
        $descendants = $node->getDescendants();
        if (false === $descendants) {
            return array();
        }

        $pks = array();
        foreach ($descendants as $descendant) {
            $pks[] = $descendant->getId();
        }

        return $pks;
    }

    public function openThread(sfGuardUser $author)
    {
        $thread = new ForumThread();
        $thread->setBoard($this);
        $thread->setAuthor($author);
        
        return $thread;
    }

    /**
     * Returns the list of parent categories.
     *
     * @param int|null $depth The seniority depth
     *
     * @return ForumCategory[]
     */
    public function getParents($depth = null)
    {
        /** @var Doctrine_Node_NestedSet $node */
        $node = $this->getNode();
        if (!$node->hasParent()) {
            return array();
        }

        $parents = array();
        foreach ($node->getAncestors($depth) as $parent) {
            $parents[] = $parent;
        }

        return $parents;
    }

    public function getAncestors()
    {
        $ancestors = array();
        $node = $this->getNode();
        if ($parent = $node->getParent()) {
            $ancestors[] = $parent;
            $ancestors = array_merge($ancestors, $parent->getAncestors());
        }
        return $ancestors;
    }
    
    public function getChildren($depth = null)
    {
        if (!$this->hasChildren()) {
            return array();
        }

        /** @var Doctrine_Node_NestedSet $node */
        $node = $this->getNode();
        $children = array();
        foreach ($node->getDescendants($depth) as $child) {
            $children[] = $child;
        }

        return $children;
    }
 
    public function getNearestChildren()
    {
        return $this->getChildren(1);
    }

    public function hasChildren()
    {
        return $this->getNode()->hasChildren();
    }

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
