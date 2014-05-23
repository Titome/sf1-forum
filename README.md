Forum
=====

A simple Bulletin board built with symfony 1.5 (fork from L'Express)


Running Tests
=============

Without code coverage.

    $ php phpunit.phar test/phpunit/unit

With code coverage (HTML).

    $ php phpunit.phar --coverage-html ./coverage test/phpunit/unit

With code coverage (Clover).

    $ php phpunit.phar --coverage-clover ./clover.xml test/phpunit/unit
