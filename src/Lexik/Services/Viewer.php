<?php
namespace Lexik\Services;

class Viewer
{
    private $viewPath;
    private $viewParameters;
    private $controllerParameters;
    private $dynamizer;

    public function __construct()
    {
        $this->dynamizer = new Dynamizer();
    }

    public function setViewParameters($parameters)
    {
        $this->viewParameters = $parameters;
        return $this;
    }

    public function setControllerParameters($parameters)
    {
        $this->controllerParameters = $parameters;
        return $this;
    }

    public function render()
    {
        $this->createPath();
        $view = file_get_contents($this->viewPath);
        $result = $this->dynamizer->setParameters($this->controllerParameters)->setView($view)->dynamize();
        echo $result;
    }

    private function createPath()
    {
        list($controller, $action) = $this->viewParameters;
        $viewPathString = sprintf('../src/Lexik/Views/%s/%s.html', $controller, $action);

        if(!file_exists($viewPathString)){
            throw new \Exception("La vue $viewPathString n'existe pas.");
        }

        $this->viewPath = $viewPathString;
    }
}