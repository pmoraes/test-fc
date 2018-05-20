<?php

require_once 'src/Router/Router.php'; 

class Request
{
    /**
     * Post Request Data
     *
     * @var array
     */
    private $__data = [];

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->__processPostRequest();
    }

    /**
     * url method it will return the current url.
     *
     * @return array
     */
    public function url()
    {
        return $this->__loadRouter()->parse();
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
     * getData method return the data from post request.
     *
     * @return array
     */
    public function getData()
    {
        return $this->__data;
    }

    /**
     * setData method return the data from post request.
     *
     * @param string $field Field to be modified
     * @param string $value New value.
     * @return array
     */
    public function setData($field, $value)
    {
        $this->__data[$field] = $value;
    }

    /**
     * __processPostRequest method It wil set the post data in the request object
     *
     * @return Router
     */
    private function __processPostRequest()
    {
        if ($this->is('post')) {
            foreach ($_POST as $key => $value) {
                if (!is_numeric($key)) {
                    $this->__data[$key] = $value;
                }
            }
        }
    }

    /**
     * is method check the request method
     *
     * @return Router
     */
    public function is($method)
    {
        if (strtoupper($method) == $_SERVER['REQUEST_METHOD']) {
            return true;
        }

        return false;
    }
}