<?php slot('title', $thread->getTitle()) ?>

<?php slot('javascripts') ?>
<script type="text/javascript">
$(document).ready(function () {
  $.post("<?php echo url_for('forum_thread_incviews', array('thread' => $thread->getUuid())) ?>");
});
</script>
<?php end_slot() ?>

<?php include_partial('breadcrumb', array(
    'current_item' => $thread->getTitle(),
    'categories'   => $thread->getCategoriesTree(),
)) ?>

<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $thread->getTitle() ?></h3>
    </div>
    <div class="panel-body">
        <?php echo $thread->getHtmlContent(ESC_RAW) ?>
    </div>
    <div class="panel-footer">
        <em>
            <?php echo __('Written by %author% on %date%.', array(
                '%author%' => (string) $thread->getAuthor(),
                '%date%'   => format_datetime($thread->getCreatedAt()),
            )) ?>
            <br/>
            <?php echo format_number_choice(
                '[0]Viewed %hits% times.|[1]Viewed %hits% times and has one answer.|(1,+Inf]Viewed %hits% times and has %answers% answers.',
                array('%hits%'  => format_number($thread->getViewsCount()), '%answers%' => format_number($thread->getAnswerCount())),
                $thread->getAnswerCount()
            ) ?>
        </em>
    </div>
</div>

<hr/>

<?php if ($pager->haveToPaginate()) : ?>
    <?php include_partial('global/pagination', array(
        'pager'  => $pager,
        'route'  => 'forum_thread',
        'params' => array('thread' => $thread->getSlug()),
    )) ?>
<?php endif ?>

<?php foreach ($answers as $answer) : ?>
<div class="panel panel-default">
    <div class="panel-body">
        <?php echo $answer->getHtmlContent(ESC_RAW) ?>
    </div>
    <div class="panel-footer">
        <em>
            <?php echo __('Written by %author% on %date%.', array(
                '%author%' => (string) $thread->getAuthor(),
                '%date%'   => format_datetime($thread->getCreatedAt()),
            )) ?>
            <br/>
            <?php echo format_number_choice(
                '[0]|[1]This answer has been found useful by one person.|(1,+Inf]This answer has been found useful by %count% persons.',
                array('%count%'  => format_number($answer->getHelpful())),
                $answer->getHelpful()
            ) ?>
        </em>
    </div>
</div>
<?php endforeach ?>

<?php if ($pager->haveToPaginate()) : ?>
    <?php include_partial('global/pagination', array(
        'pager'  => $pager,
        'route'  => 'forum_thread',
        'params' => array('thread' => $thread->getSlug()),
    )) ?>
<?php endif ?>

