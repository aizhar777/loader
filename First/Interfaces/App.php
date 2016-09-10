<?php
/**
 * Created by PhpStorm.
 * User: MasterPC
 * Date: 024 24.06.16
 * Time: 15:16
 */

namespace First\Interfaces;


interface App
{

    /**
     * Инициализация компонента Request
     */
    public function initRequest();

    /**
     * Инициализация компонента Response
     */
    public function initResponse();

    /**
     * Инициализация компонента Route
     */
    public function initRoute();

    /**
     * Инициализация компонента View
     */
    public function initView();

    /**
     * Запуск приложения
     */
    public function init();
}