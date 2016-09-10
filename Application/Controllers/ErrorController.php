<?php

namespace Application\Controllers;

use First\Core\MVC\Controller;

class ErrorController extends Controller
{
    public function notFoundAction()
    {
        return "url not found";
    }
}