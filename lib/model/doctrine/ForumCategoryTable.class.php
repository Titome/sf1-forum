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
