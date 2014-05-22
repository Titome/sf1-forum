<?php if (!isset($params)) : ?>
    <?php $params = array() ?>
<?php else : ?>
    <?php $params = sfOutputEscaper::unescape($params); ?>
<?php endif ?>
<ul class="pagination">
    <li><?php echo link_to('««', $route, $params) ?></li>
    <li><?php echo link_to('«', $route, array_merge($params, array('page' => $pager->getPreviousPage()))) ?></li>
    <?php foreach ($pager->getLinks(7) as $page) : ?>
        <li class="<?php echo $page == $pager->getPage() ? 'active' : 'page' ?>">
            <?php if ($page == $pager->getPage()) : ?>
                <span><?php echo $page ?></span>
            <?php else : ?>
                <?php echo link_to($page, $route, array_merge($params, array('page' => $page))) ?>
            <?php endif ?>
        </li>
    <?php endforeach ?>
    <li><?php echo link_to('»', $route, array_merge($params, array('page' => $pager->getNextPage()))) ?></li>
    <li><?php echo link_to('»»', $route, array_merge($params, array('page' => $pager->getLastPage()))) ?></li>
</ul>
