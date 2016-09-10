<?php

namespace First\Core\MVC;


use First\Core\HTTP\Request;

class Controller
{
    /**
     * @var Request
     */
    public $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->beforeAction();
    }

    public function beforeAction(){}
    public function afterAction(){}

    public function __destruct()
    {
        $this->afterAction();
    }
}