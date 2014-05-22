<?php use_helper('I18N', 'Number') ?>
<?php slot('title', __('Forum Boards')) ?>

<h1><?php echo __('Forum Boards') ?></h1>

<?php include_partial('breadcrumb', array(
    'current_item' => __('All boards'),
)) ?>

<?php include_partial('categories', array(
    'categories' => $categories,
)) ?>
