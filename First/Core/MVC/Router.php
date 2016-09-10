<?php

namespace First\Core\MVC;

use First\Core\HTTP\Request;

class Router
{
    /**
     * @var Request Request Class
     */
    public $request;

    /**
     * @var array
     */
    public $config;

    /**
     * @var \Twig_Environment
     */
    public $template;

    const PATH_TO_CONTROLLER = "Application\\Controllers\\";
    const SUFFIX_CONTROLLER = "Controller";
    const SUFFIX_ACTION = "Action";
    const FILE_EXTENSION = ".php";

    public function __construct(Request $request, array $config, \Twig_Environment $template)
    {
        $this->request = $request;
        $this->config = $config;
        $this->template = $template;
    }

    // контроллер и действие по умолчанию
    public $controller_name = 'Home';
    public $action_name = 'index';


    public function start()
    {
        $routes = $this->request->getParts();

        // получаем имя контроллера
        if (!empty($routes[0])) {
            $this->controller_name = $routes[0];
        }

        // получаем имя экшена
        if (!empty($routes[1])) {
            $this->action_name = $routes[1];
        }

        // добавляем постфиксы
        $controller_name = $this->controller_name . self::SUFFIX_CONTROLLER;
        $action_name = $this->action_name . self::SUFFIX_ACTION;

        // подцепляем файл с классом контроллера
        //$controller_file = strtolower($controller_name) . self::FILE_EXTENSION;
        $controller_path = self::PATH_TO_CONTROLLER . $controller_name;

        if (!class_exists($controller_path)) {
            $this->ErrorPage404();
        }

        // создаем контроллер
        $controller = new $controller_path($this->request);
        $action = $action_name;

        if (method_exists($controller, $action)) {
            // вызываем действие контроллера
            $data = [
                "title" => $this->config["site"]["name"],
                "content" => $controller->$action()
            ];

            $view = $this->template->loadTemplate('main.twig');

            echo $view->render($data);

        } else {
            // здесь также разумнее было бы кинуть исключение
            $this->ErrorPage404();
        }
    }

    public function ErrorPage404()
    {
        echo '<br><b>Controller:</b>' . $this->controller_name;
        echo '<br><b>Action:</b>' . $this->action_name;

        $host = $this->config['site']['url'];
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host . 'error/notfound');
    }
}