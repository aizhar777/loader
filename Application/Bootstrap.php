<?php

namespace Application;

use First\Core\HTTP\Request;
use First\Interfaces\App;
use First\Core\MVC\Router;

class Bootstrap implements App
{
    /**
     * @var array
     */
    public $config;

    /**
     * @var Request
     */
    public $request;

    /**
     * @var \Twig_Environment
     */
    public $template;

    /**
     * Инициализация компонента DI
     */
    public function initConfig()
    {
        $this->config = parse_ini_file(ROOT.'Config/config.'.STATUS.'.ini');
    }

    /**
     * Инициализация компонента Request
     */
    public function initRequest()
    {
        $this->request = new Request();
    }

    /**
     * Инициализация компонента Response
     */
    public function initResponse()
    {
        // TODO: Implement response() method.
    }

    /**
     * Инициализация компонента Route
     */
    public function initRoute()
    {
        $router = new Router($this->request, $this->config, $this->template);

        return $router;
    }

    /**
     * Инициализация компонента View
     */
    public function initView()
    {
        require_once ROOT . 'Components/Twig/Autoloader.php';
        \Twig_Autoloader::register();

        $loader = new \Twig_Loader_Filesystem(ROOT. "Templates/". $this->config['template']['dafault']);
        $twig = new \Twig_Environment($loader, array(
            'cache' => ROOT.'Cache/template',
            'auto_reload' => true
        ));
        $this->template = $twig;
    }

    /**
     * Запуск приложения
     * @return Router
     */
    public function init()
    {
        $this->initConfig();
        $this->initRequest();
        $this->initResponse();
        $this->initView();
        echo __METHOD__.'<br>';

        return $this->initRoute();
    }

}