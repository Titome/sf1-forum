<?php

class ForumAnswerTable extends ForumMessageTable
{
    public function getPaginatedAnswers($page, $maxPerPage, ForumThread $thread)
    {
        $query = $this
            ->createQuery('an')
            ->leftJoin('an.Author a')
            ->andWhere('an.thread_id = ?', $thread->getId())
            ->orderBy('an.created_at ASC')
        ;

        return $this->createPager($page, $maxPerPage, $query);
    }

    /**
     * Returns an instance of this class.
     *
     * @return ForumAnswerTable The table instance
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ForumAnswer');
    }
}
