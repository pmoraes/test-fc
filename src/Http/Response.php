<?php

class Response
{

    /**
     * redirect method it will redirect to other action
     *
     * @return void
     */
    public function redirect($route)
    {
        $this->__headerRedirect($route);
    }
    
    /**
     * __headerRedirect method it will redirect to the requested page
     *
     * @param string $route 
     * @return void
     */
    public function __headerRedirect($route)
    {
        header("Location: " . $route);
        exit;
    }
}