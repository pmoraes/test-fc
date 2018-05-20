<?php

require_once 'Router.php';

class Dispatcher
{
    /**
     * Request object
     *
     * @var array
     */
    private $__request = null;

    /**
     * Response object
     *
     * @var array
     */
    private $__response = null;

    /**
     * Constructor
     *
     * @param Request $request Request instance
     * @param Response $response Response instance
     */
    public function __construct(Request $request, Response $response)
    {
        $this->__request = $request;
        $this->__response = $response;
    }

    /**
     * dispatch method it will call Router class to load the controllers
     *
     * @return void
     */
    public function dispatch()
    {
        $router = $this->__loadRouter();

        $routerParams = $router->parse();

        try {
            $controller = $this->__loadController($routerParams);
        } catch (Exception $e) {
            echo $e->getMessage();
            die;
        }

        $params = [];
        if (!empty($routerParams['params'])) {
            $params = $routerParams['params'];
        }

        $response = $controller->{$routerParams['action']}(...$params);
    }

    /**
     * __loadRouter method it will instantiate the router
     *
     * @return Router
     */
    private function __loadRouter()
    {
        return new Router();
    }

    /**
     * __loadController method it will instantiate the controller
     *
     * @param array $routerParams Params parsed from request.
     * @return Router
     * @throws Exception
     */
    private function __loadController($routerParams)
    {
        $fileName = ucfirst(strtolower($routerParams['controller'])) . 'Controller.php';

        if (!file_exists(CONTROLLERS . DS . $fileName)) {
            throw new Exception("Controller {$routerParams['controller']} not found", 404);
        }

        require_once CONTROLLERS . DS . $fileName;

        $controllerName = ucfirst(strtolower($routerParams['controller'])) . 'Controller';

        return new $controllerName($this->__request, $this->__response);
    }
}