<?php
namespace CodeStx\Draken\Component\HttpKernel;

interface KernelInterface
{
    public function boot();

    public function shutdown();

    public function locateResource(string $name);

    public function isDebug();

    public function getEnvironment();
}