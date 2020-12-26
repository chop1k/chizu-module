<?php

namespace Chizu\Module;

use Chizu\DI\Container;
use Chizu\Event\Events;
use Ds\Map;

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

    protected Map $modules;

    /**
     * @return Map
     */
    public function getModules(): Map
    {
        return $this->modules;
    }

    public function __construct(Events $events, Container $container, Map $modules)
    {
        $this->events = $events;
        $this->container = $container;
        $this->modules = $modules;
        $this->initiated = false;
    }
}