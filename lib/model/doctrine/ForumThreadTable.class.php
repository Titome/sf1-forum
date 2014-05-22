<?php

class ForumThreadTable extends ForumMessageTable
{
    public function getPaginatedThreads($page, $maxPerPage, ForumCategory $board = null)
    {
        $query = $this->createQuery('t');
        $query->leftJoin('t.Author a');

        if ($board) {
            $query->andWhere('t.board_id = ?', $board->getId());
        }

        $query->orderBy('t.updated_at DESC');

        return $this->createPager($page, $maxPerPage, $query);
    }

    private function createPager($page, $maxPerPage, Doctrine_Query $query = null)
    {
        $pager = new sfDoctrinePager('ForumThread', $maxPerPage);
        $pager->setPage((int) $page);

        if ($query) {
            $pager->setQuery($query);
        }

        $pager->init();

        return $pager;
    }

    /**
     * Returns an instance of this class.
     *
     * @return ForumThreadTable The table instance
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ForumThread');
    }
}
