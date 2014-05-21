<?php use_helper('I18N', 'Number') ?>
<?php slot('title', $category->getName()) ?>

<h1><?php echo $category ?></h1>

<?php include_partial('breadcrumb', array(
    'current_item' => $category->getName(),
    'categories'   => $category->getParents(),
)) ?>
