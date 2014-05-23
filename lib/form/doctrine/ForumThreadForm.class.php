<?php

class ForumThreadForm extends BaseForumThreadForm
{
    public function configure()
    {
        $table = $this->getOption('board_table');
        if (!$table instanceof ForumCategoryTable) {
            throw new RuntimeException('ForumThreadForm requires a "board_table" option with a ForumCategoryTable instance.');
        }

        $fields = array('title', 'raw_content');
        if (!$this->getObject()->isNew()) {
            $fields = array_merge($fields, array('solved', 'closed'));
        }

        $this->useFields($fields);

        $this->validatorSchema['title']->setOption('min_length', 5);

        $this->validatorSchema['raw_content']->setOption('required', false);
        $this->validatorSchema['raw_content']->setOption('min_length', 10);
    }

    protected function doSave($con = null)
    {
        $isNew = $this->isNew();

        parent::doSave($con);

        if ($isNew) {
            $thread = $this->getObject();
            $board = $thread->getBoard();

            $table = $this->getOption('board_table');
            $table->updateThreadCount($board->getParentRoot());
        }
    }
}
