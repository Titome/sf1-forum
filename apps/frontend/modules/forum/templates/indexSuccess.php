<?php use_helper('I18N', 'Number') ?>
<?php slot('title', __('Forum Boards')) ?>

<h1><?php echo __('Forum Boards') ?></h1>

<?php include_partial('breadcrumb', array(
    'current_item' => __('All boards'),
)) ?>

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
            </td>
            <td><?php echo format_number($category->getThreadCount()) ?></td>
            <td><?php echo format_number($category->getAnswerCount()) ?></td>
            <td><?php echo $category->getLastMessage() ?: 'n/a' ?></td>
            <td><?php echo $category->getLastAuthor()  ?: 'n/a' ?></td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table> 
