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
}
