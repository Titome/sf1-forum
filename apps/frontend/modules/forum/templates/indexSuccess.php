<ul>
    <li>
        <a href="<?php echo url_for('forum_category', array('category' => 'programming')) ?>"
           title="Web Development Programming">Programming</a>
        <?php /*echo link_to(
            'Programming',
            'forum_category',
            array('category' => 'programming'),
            array('title' => 'Web Development Programming')
        ) */?>
    </li>
    <li>
        <?php echo link_to('Fooding', 'forum_category', array(
            'category' => 'fooding'
        )) ?>
    </li>
    <li>
        <?php echo link_to('Gardening', 'forum_category', array(
            'category' => 'gardening'
        )) ?>
    </li>
</ul>
