<?php use_helper('I18N', 'Number') ?>
<?php slot('title', $category->getName()) ?>

<h1><?php echo $category ?></h1>

<ul class="breadcrumb">
    <li>
        <?php echo link_to(__('Home'), 'homepage') ?>
    </li>
    <li>
        <?php echo link_to(__('Forum'), 'forum') ?>
    </li>
    <?php foreach ($category->getParents() as $parent) : ?>
    <li>
        <?php echo link_to($parent->getName(), 'forum_category', array(
            'category' => $parent->getSlug()
        )) ?>
    </li>
    <?php endforeach ?>
    <li>
        <?php echo $category->getName() ?>
    </li>
</ul>
