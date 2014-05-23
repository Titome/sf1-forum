<?php slot('title', __('New thread')) ?>

<?php include_partial('forum/breadcrumb', array(
    'current_item' => __('New thread'),
    'categories'   => $thread->getCategoriesTree(),
)) ?>

<?php $url = url_for('forum_new_thread', array(
    'board' => $category->getSlug(),
)) ?>

<form action="<?php echo $url ?>" method="post">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">
                <?php echo __('New thread') ?>
            </h3>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <?php echo $form['title']->renderError() ?>
                <?php echo $form['title']->renderLabel(__('The title of your thread')) ?>
                <?php echo $form['title']->render(array('class' => 'form-control input-lg')) ?>
            </div>
            <div class="form-group">
                <?php echo $form['raw_content']->renderError() ?>
                <?php echo $form['raw_content']->renderLabel(__('Type your content with Markdown')) ?>
                <?php echo $form['raw_content']->render(array('class' => 'form-control', 'rows' => '15')) ?>
            </div>
        </div>
        <div class="panel-footer">
            <?php echo $form->renderHiddenFields() ?>
            <button type="submit" class="btn btn-default">
                <?php echo __('Create new thread') ?>
            </button>
        </div>
    </div>
</form>
