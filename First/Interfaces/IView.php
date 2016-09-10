<?php
namespace First\Interfaces;


interface IView
{
    /**
     * @param string $view template name
     */
    public function set($view);

    /**
     * @param string $key name
     * @param mixed $value content
     */
    public function withKey($key, $value);

    /**
     * @param array $data content
     */
    public function with(array $data);
}