<?php

namespace MiladRahimi\PhpRouter\Tests;

use MiladRahimi\PhpContainer\Container;
use MiladRahimi\PhpRouter\Router;
use MiladRahimi\PhpRouter\Services\Publisher;
use MiladRahimi\PhpRouter\Tests\Testing\FakePublisher;
use Throwable;

class ContainerTest extends TestCase
{
    /**
     * @throws Throwable
     */
    public function test_setting_and_getting_container()
    {
        $router = new Router();
        $router->getContainer()->singleton('name', 'Pink Floyd');;
        $router->getContainer()->singleton(Publisher::class, new FakePublisher());;

        $router->get('/', function (Container $container) {
            return $container->get('name');
        })->dispatch();

        $this->assertEquals('Pink Floyd', $this->output($router));
    }
}
