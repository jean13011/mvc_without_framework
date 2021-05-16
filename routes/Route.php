<?php


namespace Router;


use Database\DBConnection;

class Route
{
    public $path;
    public $action;
    public $matches;

    /**
     * Route constructor.
     * @param $path
     * @param $action
     */
    public function __construct ($path, $action)
    {
        $this->path = trim($path, '/');
        $this->action = $action;
    }

    /**
     * @param string $url
     */
    public function matches(string $url)
    {
        $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path);
        $pathToMatch = "#^$path$#";

        if (preg_match($pathToMatch, $url, $matches))
        {
            $this->matches = $matches;
            return true;

        } else {
            return false;
        }
    }

    public function execute ()
    {
        $params = explode('@', $this->action);
        $controller = new $params[0](new DBConnection("myapp", "localhost:3306", "root", "Jean100498753."));
        $method = $params[1];

        return isset($this->matches[1]) ? $controller->$method($this->matches[1]) : $controller->$method();
    }

}