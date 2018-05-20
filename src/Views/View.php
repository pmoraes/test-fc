<?php

class View
{
    /**
     * Paths
     *
     * @var array
     */
    private $__paths = null;

    /**
     * View Data
     *
     * @var array
     */
    private $__viewData = [];

    /**
     * setPaths method Paths to know what file should be rendered.
     *
     * @param array $paths Paths to be used to find the view.
     * @return void
     */
    public function setPaths($paths)
    {
        $this->__paths = $paths;
    }

    /**
     * getPaths method It will return the paths to include the view file into the base layout
     *
     * @return void
     */
    public function getPaths($key = false)
    {
        if ($key) {
            return $this->__paths[$key];
        }

        return $this->__paths;
    }

    /**
     * setViewData method Data to be used in the view file.
     *
     * @param array $data Data to be used in the view file.
     * @return void
     */
    public function setViewData($data)
    {
        $this->__viewData = $data;
    }

    /**
     * getViewData method It will return all data available to be used in the view file.
     *
     * @return void
     */
    public function getViewData()
    {
        return $this->__viewData;
    }

    /**
     * render method this method will merge the template and the page content.
     *
     * @return void
     */
    public function render()
    {
        $content = $this->__layoutContent();

        extract($this->getViewData());
        ob_start();
        include $content;
        ob_get_flush();
    }

    /**
     * __content method return the content to be rendered.
     *
     * @return string
     */
    private function __content()
    {
        $layoutContent = $this->__layoutContent();

        $content = str_replace('{{ content }}', $fileContent, $layoutContent);

        return $content;
    }

    /**
     * __fileContent method return the current action content.
     *
     * @return string
     */
    private function __fileContent()
    {
        return VIEWS . DS . $this->__paths['controller'] . DS . $this->__paths['action'] . '.php';
    }

    /**
     * __layoutContent method return the base layout.
     *
     * @return string
     */
    private function __layoutContent()
    {
        return VIEWS . DS . 'Layout' . DS . 'base.php';
    }
}
