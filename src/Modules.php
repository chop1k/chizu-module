<?php

namespace Chizu\Module;

use Ds\Map;

class Modules
{
    protected Map $modules;

    public function add(string $name, $module): void
    {
        $this->modules->put($name, $module);
    }

    public function has(string $name): bool
    {
        return $this->modules->hasKey($name);
    }

    public function get(string $name): Module
    {
        $class = $this->modules->get($name);

        if (is_string($class))
        {
            $instance = new $class();

            $this->modules->put($name, $instance);

            return $instance;
        }

        return $class;
    }

    public function getAndInitiate(string $name): Module
    {
        $module = $this->get($name);

        if (!$module->isInitiated())
        {
            $module->getDispatcher()->dispatch($module::InitiationEvent, null);
        }

        return $module;
    }

    public function __construct($values = [])
    {
        $this->modules = new Map($values);
    }
}