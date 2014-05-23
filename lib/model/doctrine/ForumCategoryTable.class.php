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
