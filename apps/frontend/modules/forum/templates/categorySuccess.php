<?php use_helper('I18N', 'Number', 'Text') ?>
<?php slot('title', $category->getName()) ?>

<h1><?php echo $category ?></h1>

<?php include_partial('breadcrumb', array(
    'current_item' => $category->getName(),
    'categories'   => $category->getParents(),
)) ?>

<?php if ($category->getDescription()) : ?>
    <?php echo simple_format_text($category->getDescription()) ?>
<?php endif ?>

<?php if ($category->hasChildren()) : ?>
    <?php include_partial('categories', array(
        'categories' => $category->getNearestChildren(),
    )) ?>
<?php endif ?>
