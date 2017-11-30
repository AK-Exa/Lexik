<?php
namespace Lexik\Services;

class Dispatcher
{
    private $parameters;
    private $viewer;
    private $controller;
    private $action;

    public function __construct()
    {
        $this->parameters = $_GET;
        $this->viewer = new Viewer();
    }

    public function dispatch()
    {
        $viewParameters = $this->extractControllerAndActionParameters();
        $controllerParameters = $this->executeAction();

        $this->viewer
            ->setViewParameters($viewParameters)
            ->setControllerParameters($controllerParameters)
            ->render();
    }

    private function extractControllerAndActionParameters()
    {
        $this->controller = array_key_exists('controller', $this->parameters) ? $this->parameters['controller'] : DEFAULT_CONTROLLER;
        $this->action = array_key_exists('action', $this->parameters) ? $this->parameters['action'] : DEFAULT_ACTION;

        return array($this->controller, $this->action);
    }

    public function executeAction()
    {
        $controllerClass = sprintf('\\Lexik\\Controller\\%sController', ucfirst($this->controller));

        if(!class_exists($controllerClass)){
            throw new \Exception("La class $controllerClass n'existe pas");

        }

        $controller = new $controllerClass();
        $action = sprintf('%sAction', $this->action);

        if(!method_exists($controller, $action)){
            throw new \Exception("Action $action n'existe pas dans la class $controllerClass");
        }

        $this->cleanGetParameters();
        return call_user_func_array(array($controller, $action), $this->parameters);
    }

    private function cleanGetParameters()
    {
        switch(true){
            case array_key_exists('controller', $this->parameters):
                unset($this->parameters['controller']);
            case array_key_exists('action', $this->parameters):
                unset($this->parameters['action']);
        }
    }
}
