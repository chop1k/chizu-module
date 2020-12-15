<?php

namespace Chizu\Module;

use Chizu\DI\Container;
use Chizu\Event\Events;

class Module
{
    public const InitiationEvent = 'module.initiation';

    protected Events $events;

    public function getEvents(): Events
    {
        return $this->events;
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
        $this->events = new Events();
        $this->container = new Container();
        $this->modules = new Modules();
        $this->initiated = false;
    }
}