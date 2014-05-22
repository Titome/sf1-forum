<?php

class ForumThreadTable extends ForumMessageTable
{
    /**
     * Returns a thread by its unique identifier.
     *
     * @param string $identifier The slug or the UUID
     * @return ForumThread
     */
    public function getThread($identifier)
    {
        $q = $this
            ->createQuery('t')
            ->leftJoin('t.Author a')
            ->leftJoin('t.Board b')
            ->where('t.slug = ?', $identifier)
            ->orWhere('t.uuid = ?', $identifier)
        ;

        return $q->fetchOne();
    }

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
