<?php if (!isset($categories)) : $categories = array(); endif ?>
<ul class="breadcrumb">
    <li><?php echo link_to(__('Home'), 'homepage') ?></li>
<?php foreach ($categories as $category) : ?>
    <li><?php echo link_to($category->getName(), 'forum_category', array(
        'category' => $category->getSlug()
    )) ?></li>
<?php endforeach ?>
    <li><?php echo $current_item ?></li>
</ul>
