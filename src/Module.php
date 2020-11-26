<?php

namespace Chizu\Module;

use Chizu\DI\Container;
use Chizu\Event\Dispatcher;

class Module
{
    public const InitiationEvent = 'Initiation';

    protected Dispatcher $dispatcher;

    public function getDispatcher(): Dispatcher
    {
        return $this->dispatcher;
    }

    protected Container $container;

    public function getContainer(): Container
    {
        return $this->container;
    }

    public function __construct()
    {
        $this->dispatcher = new Dispatcher();

        $this->container = new Container();
    }
}