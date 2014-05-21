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
        $q = $this
            ->createQuery('c')
            ->where('c.enabled = ?', true)
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
            ->createQuery('c')
            ->where('c.level = ?', 0)
            ->andWhere('c.enabled = ?', true)
            ->orderBy('c.name ASC')
        ;

        return $q->execute();
    }
}
