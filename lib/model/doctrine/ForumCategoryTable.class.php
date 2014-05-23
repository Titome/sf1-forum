<?php

class ForumCategoryTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return ForumCategoryTable The table instance
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ForumCategory');
    }

    public function getThreadCount(ForumCategory $category)
    {
        $pks = $category->getChildrenPks();
        $pks[] = $category->getId();

        $q = Doctrine_Query::create()
            ->from('ForumThread t')
            ->whereIn('t.board_id', $pks)
        ;

        return (int) $q->count();
    }

    public function updateThreadCount(ForumCategory $category)
    {
        /** @var Doctrine_Node_NestedSet $node */
        $node = $category->getNode();
        foreach ($node->getDescendants() as $descendant) {
            $total = $this->getThreadCount($descendant);
            $descendant->setThreadCount($total);
            $descendant->save();
        }
    }
    
    /**
     * Retrieves one active category with its slug.
     *
     * @param  string $slug The forum category slug
     *
     * @return ForumCategory
     */
    public function getCategory($slug)
    {
        if (empty($slug)) {
            return false;
        }

        $q = $this
            ->addActiveCategoryQuery()
            ->andWhere('c.slug = ?', $slug)
        ;

        return $q->fetchOne();
    }

    /**
     * Retrieves the list of root categories.
     *
     * @return Doctrine_Collection<ForumCategory>
     */
    public function getRootCategories()
    {
        $q = $this
            ->addActiveCategoryQuery()
            ->andWhere('c.level = ?', 1)
            ->orderBy('c.name ASC')
        ;

        return $q->execute();
    }

    private function addActiveCategoryQuery(Doctrine_Query $q = null)
    {
        if (null === $q) {
            $q = $this->createQuery('c');
        }

        $alias = $q->getRootAlias();
        $q->andWhere($alias.'.enabled = ?', true);
        
        return $q;
    }
}
