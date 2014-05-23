<?php

require_once dirname(__FILE__).'/../vendor/autoload.php';
require_once dirname(__FILE__).'/../vendor/lexpress/symfony1/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->enablePlugins(array(
        'sfDoctrinePlugin',
        'sfDoctrineGuardPlugin',
        'sfPHPUnit2Plugin',
    ));
  }
}
