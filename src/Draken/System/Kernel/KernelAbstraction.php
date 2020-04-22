<?php
namespace Draken\System\Kernel;

use Draken\System\XHttp\RequestInterface;
use Draken\System\XHttp\RoutableInterface;

abstract class KernelAbstraction implements  KernelInterface, TerminableInterface
{
    /**
     * @var BundleInterface[]
     */
    protected $bundles = [];

    protected $container;
    protected $environment;
    protected $debug;
    protected $booted = false;

    private $requestStackSize = 0;
    private $resetServices = false;

    public function __construct(string $environment, bool $debug)
    {
        $this->environment = $environment;
        $this->debug = $debug;
    }

    // TODO: Implement boot() method.
    public function boot()
    { }

    public function shutdown()
    {
        if (false === $this->booted) {
            return;
        }

        $this->booted = false;

        foreach ($this->getBundles() as $bundle) {
            $bundle->shutdown();
            $bundle->setContainer(null);
        }

        $this->container = null;
        $this->requestStackSize = 0;
        $this->resetServices = false;
    }

    public function terminate(RequestInterface $request, RoutableInterface $response)
    {
        if (false === $this->booted) {
            return;
        }

        //    if ($this->getHttpKernel() instanceof TerminableInterface) {
        //       $this->getHttpKernel()->terminate($request, $response);
        //    }
    }

    /**
     * Gets a HTTP kernel from the container.
     *
     * @return HttpKernelInterface
     */
    protected function getHttpKernel()
    {
        return $this->container->get('http_kernel');
    }

    /**
     * {@inheritdoc}
     */
    public function getBundles()
    {
        return $this->bundles;
    }

    /**
     * {@inheritdoc}
     */
    public function getBundle(string $name)
    {
        if (!isset($this->bundles[$name])) {
            $class = get_debug_type($this);

            throw new \InvalidArgumentException(sprintf('Bundle "%s" does not exist or it is not enabled. Maybe you forgot to add it in the "registerBundles()" method of your "%s.php" file?', $name, $class));
        }

        return $this->bundles[$name];
    }

    /**
     * {@inheritdoc}
     */
    public function locateResource(string $name)
    {
        if ('@' !== $name[0]) {
            throw new \InvalidArgumentException(sprintf('A resource name must start with @ ("%s" given).', $name));
        }

        if (false !== strpos($name, '..')) {
            throw new \RuntimeException(sprintf('File name "%s" contains invalid characters (..).', $name));
        }

        $bundleName = substr($name, 1);
        $path = '';
        if (false !== strpos($bundleName, '/')) {
            list($bundleName, $path) = explode('/', $bundleName, 2);
        }

        $bundle = $this->getBundle($bundleName);
        if (file_exists($file = $bundle->getPath().'/'.$path)) {
            return $file;
        }

        throw new \InvalidArgumentException(sprintf('Unable to find file "%s".', $name));
    }

    /**
     * {@inheritdoc}
     */
    public function getEnvironment()
    {
        return $this->environment;
    }

    /**
     * {@inheritdoc}
     */
    public function isDebug()
    {
        return $this->debug;
    }
}
