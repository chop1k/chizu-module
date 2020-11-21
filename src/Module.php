<?php

namespace Chizu\Module;

use Chizu\DI\Container;
use Chizu\Event\Dispatcher;

abstract class Module
{
    public abstract function getDispatcher(): Dispatcher;
    public abstract function getContainer(): Container;
    public abstract function preload(Container $container): void;
    public abstract function load(): void;
}