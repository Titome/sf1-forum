<?php

require_once dirname(__FILE__).'/../../sfDatabaseFunctionalTestCase.php';

class functional_frontend_threadActionsTest extends sfDatabaseFunctionalTestCase
{
    public function testCreateNewThread()
    {
        $browser = $this->getBrowser();

        $browser->
            get('/en/forum')->

            with('response')->begin()->
                isStatusCode(200)->
                checkElement('body', '/Web Programming/')->
                checkElement('body', '/Arts/')->
            end()->
        
            click('Web Programming')->

            with('response')->begin()->
                isStatusCode(200)->
                checkElement('body', '/PHP Development/')->
                checkElement('body', '/JavaScript/')->
                checkElement('body', '/CSS/')->
            end()->
            
            click('PHP Development')->
            click('Symfony Framework')->
            click('Open new thread')->
            click(
                'input[value="Signin"]',
                array(
                    'signin' => array(
                        'username' => 'hugo.hamon',
                        'password' => 'changeme',
                    )
                ),
                array('_with_csrf' => true)
            )->
            with('response')->isRedirected()->
            followRedirect()->
            click(
                'button[type="submit"]',
                array(
                    'forum_thread' => array(
                        'title'       => 'My Super New Thread',
                        'raw_content' => 'My **Super New** Thread',
                    )
                ),
                array('_with_csrf' => true)
            )->
            with('response')->isRedirected()->
            followRedirect()->
            with('response')->checkElement('body', '/My Super New Thread/')
            
        ;
    }
}
