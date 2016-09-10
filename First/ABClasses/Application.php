<?php
/*
 * Клас инициализации приложения
 *
 * Автозагрузка всех компонентов сайта
 *
 * @author Aizharyk Olexin <aizharolexin@gmail.com>
 * @copyright Aizhar777
 * @package FirstCMS
 * @subpackage Bootstrap
 * @version 0.0.1
 *
*/
namespace First\ABClasses;

use First\Interfaces\App;

abstract class Application implements App
{
    /**
     * Инициализация компонента Request
     */
    abstract function request();
    /**
     * Инициализация компонента Response
     */
    abstract function response();
    /**
     * Инициализация компонента Route
     */
    abstract function route();
    /**
     * Инициализация компонента View
     */
    abstract function view();
    /**
     * Запуск приложения
     */
    abstract function start();
}