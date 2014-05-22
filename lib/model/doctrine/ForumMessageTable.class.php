<?php

class ForumMessageTable extends Doctrine_Table
{
    protected function createPager($page, $maxPerPage, Doctrine_Query $query = null)
    {
        $pager = new sfDoctrinePager($this->_options['name'], $maxPerPage);
        $pager->setPage((int) $page);

        if ($query) {
            $pager->setQuery($query);
        }

        $pager->init();

        return $pager;
    }
}
