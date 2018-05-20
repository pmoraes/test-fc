<?php

require_once 'src/Config/routes.php';

class Router {

    /**
     * Routes map
     *
     * @var array
     */
    private static $__map = [];

    /**
     * parse method it will parse the request and return an array with the params to call the controller.
     *
     * @return array
     */
    public function parse()
    {
        $url = $_SERVER['REQUEST_URI'];

        try {
            $url = $this->match($url);
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return $url;
    }

    /**
     * match method it will check if the route matches, Otherwise it will throw an exception.
     *
     * @param string|array $url Url to be matched.
     * @return array
     * @throws Exception
     */
    public function match($url)
    {
        $currentUrl = array_values(array_filter(explode('/', $url)));
        if (empty($currentUrl)) {
            $url = '/';
        }

        if (isset(self::$__map[$url])) {
            return self::$__map[$url];
        }

        if (is_array($currentUrl)) {
            if (empty($currentUrl[1])) {
                $currentUrl[1] = 'index';
            }

            $currentUrl = $this->__combineKeys($currentUrl);

            return $currentUrl;
        }

        throw new Exception("No route matches with {$url}", 404);
    }

    /**
     * __combineKeys method It will combine the route keys with route valuesl
     *
     * @param array $url Current url.
     * @return void
     */
    private function __combineKeys($url)
    {
        $staticKeys = [
            'controller',
            'action'
        ];

        $currentUrl = array_chunk($url, 2);
        $url = array_combine($staticKeys, $currentUrl[0]);
        unset($currentUrl[0]);
        $params = [];
        foreach ($currentUrl as $key => $urlParams) {
            $params = array_merge($params, $urlParams);
        }

        if (!empty($params)) {
            $url['params'] = $params;
        }

        return $url;
    }

    /**
     * set method It will set all routes for match them.
     *
     * @param array $options Define the controller and action.
     * @return void
     */
    public static function set($key, $options)
    {
        self::$__map[$key] = $options;
    }
}