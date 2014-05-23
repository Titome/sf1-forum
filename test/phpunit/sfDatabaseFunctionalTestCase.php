<?php

require_once dirname(__FILE__) . '/bootstrap/functional.php';

class sfDatabaseFunctionalTestCase extends sfPHPUnitBaseFunctionalTestCase
{
    private $fixturesLoaded;
    protected $purgeDatabase;

    protected function _start()
    {
        parent::_start();
        $app = $this->getApplication();
        $configuration = ProjectConfiguration::getApplicationConfiguration($app, 'test', true);
        $database = new sfDatabaseManager($configuration);

        if (!$this->fixturesLoaded) {
            Doctrine_Core::loadData(sfConfig::get('sf_test_dir').'/phpunit/fixtures');
            $this->fixturesLoaded = true;
        }

        $this->purgeDatabase = false;
    }

    protected function _end()
    {
        if ($this->purgeDatabase) {
            $data = new Doctrine_Data();
            $data->purge();
            $this->fixturesLoaded = false;
        }
        parent::_end();
    }

    protected function getApplication()
    {
        return 'frontend';
    }

    protected function purgeDatabase()
    {
        $this->purgeDatabase = true;
    }
}
