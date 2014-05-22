<?php use_helper('I18N', 'Number', 'Text', 'Date') ?>
<?php slot('title', $thread->getTitle()) ?>

<?php include_partial('breadcrumb', array(
    'current_item' => $thread->getTitle(),
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
