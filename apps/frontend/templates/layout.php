<?php use_helper('I18N') ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <title><?php include_slot('title', __('Forums')) ?></title>
        <link rel="shortcut icon" href="/favicon.ico" />
        <?php use_stylesheet('/assets/css/bootstrap.min.css') ?>
        <?php use_stylesheet('/assets/css/bootstrap-theme.min.css') ?>
        <?php use_javascript('/assets/js/jquery.min.js') ?>
        <?php use_javascript('/assets/js/bootstrap.min.js') ?>
        <?php include_stylesheets() ?>
    </head>
    <body>
        <div id="container" class="container">
            <div class="row col-lg-12">
                <div class="header">
                    <ul>
                    <?php if ($sf_user->isAuthenticated()) : ?>
                        <li><?php echo $sf_user ?></li> 
                        <li><?php echo link_to(__('Signout'), 'sf_guard_signout') ?></li>
                    <?php else : ?>
                        <li><?php echo link_to(__('Signin'), 'sf_guard_signin') ?></li>
                        <li><?php echo link_to(__('Signup'), 'sf_guard_register') ?></li>
                    <?php endif ?>
                    </ul>
                </div>
                <h1><?php include_slot('title', __('Forums')) ?></h1>
                <?php echo $sf_content ?>
            </div>
        </div>
        <?php include_javascripts() ?>
        <?php include_slot('javascripts') ?>
    </body>
</html>
