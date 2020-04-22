<?php
namespace CodeStx\Draken\Component\Container\Loader;

interface LoaderInterface
{
    function load($resource, string $type = null);
}