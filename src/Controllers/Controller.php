<?php

require_once 'src/Views/View.php';
require_once 'src/Utilities/Text.php';

abstract class Controller
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
     * View Data
     *
     * @var array
     */
    private $__viewData = [];

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
        $this->__instantiateModel();
    }

    /**
     * __instantiateModel method It will create an instance of the model based on the controller.
     *
     * @return void
     */
    private function __instantiateModel()
    {
        $controllerName = substr(get_class($this), 0, -10);
        $modelName = ucfirst(Text::singular(strtolower($controllerName)));

        require_once MODEL . DS . $modelName . '.php';

        $this->{$modelName} = new $modelName();
    }

    /**
     * render method It will render a view.
     *
     * @return string
     */
    public function render()
    {
        $url = $this->getRequest()->url();

        $view = $this->__loadView();
        $view->setPaths($url);
        $view->setViewData($this->__viewData);

        return $view->render();
    }

    /**
     * __loadView method it will instantiate the view class.
     *
     * @return View
     */
    private function __loadView()
    {
        return new View();
    }

    /**
     * setViewData method Data to be used in the view file.
     *
     * @return void
     */
    public function setViewData($key, $data)
    {
        $this->__viewData[$key] = $data;
    }

    /**
     * getViewData method Data to be used in the view file.
     *
     * @return void
     */
    public function setData($key, $data)
    {
        $this->__viewData[$key] = $data;
    }

    /**
     * getRequest method It will return a request object.
     *
     * @return Object Request.
     */
    public function getRequest()
    {
        return $this->__request;
    }

    /**
     * getResponse method It will return a response object.
     *
     * @return Object Response.
     */
    public function getResponse()
    {
        return $this->__response;
    }
}