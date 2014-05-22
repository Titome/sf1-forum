<table class="table table-bordered table-stripped">
    <thead>
        <tr>
            <th><?php echo __('Discussion board') ?></th>
            <th><?php echo __('Threads') ?></th>
            <th><?php echo __('Answers') ?></th>
            <th><?php echo __('Last message') ?></th>
            <th><?php echo __('Last author') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($categories as $category) : ?>
        <tr>
            <td>
                <?php echo link_to($category->getName(), 'forum_category', array(
                    'category' => $category->getSlug(),
                )) ?>
                <?php if ($category->getDescription()) : ?>
                    <br/>
                    <small><?php echo $category->getDescription() ?></small>
                <?php endif ?>
            </td>
            <td><?php echo format_number($category->getThreadCount()) ?></td>
            <td><?php echo format_number($category->getAnswerCount()) ?></td>
            <td><?php echo $category->getLastMessage() ?: 'n/a' ?></td>
            <td><?php echo $category->getLastAuthor()  ?: 'n/a' ?></td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table> 
