<?php
namespace HelloWorld\Controller;

use Pyrite\Response\ResponseBag;
use Symfony\Component\HttpFoundation\Request;
use Pyrite\Layer\Executor\Executable;

class IndexController implements Executable
{
    protected $appName = null;

    public function __construct($name = null)
    {
        $this->appName = $name;
    }

    public function setAppName($name)
    {
        $this->appName = $name;
        return $this;
    }

    /**
     * @param  Request $request The HTTP Request
     * @param  ResponseBag $bag The Bag shared by all Layers of Pyrite
     * @return string               result identifier (success / failure / whatever / ...)
     */
    public function execute(Request $request, ResponseBag $bag)
    {
        $bag->set('appname', $this->appName);
        return "success";
    }
}