<?php

namespace Chizu\Module;

use Chizu\DI\Container;
use Chizu\Event\Dispatcher;

class Module
{
    public const InitiationEvent = 'module.initiation';

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

    private bool $initiated;

    /**
     * @return bool
     */
    public function isInitiated(): bool
    {
        return $this->initiated;
    }

    public function setInitiated(bool $initiated): void
    {
        $this->initiated = $initiated;
    }

    protected Modules $modules;

    /**
     * @return Modules
     */
    public function getModules(): Modules
    {
        return $this->modules;
    }

    public function __construct()
    {
        $this->dispatcher = new Dispatcher();
        $this->container = new Container();
        $this->modules = new Modules();
        $this->initiated = false;
    }
}