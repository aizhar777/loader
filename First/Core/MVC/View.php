<?php
/**
 * Created by PhpStorm.
 * User: MasterPC
 * Date: 024 24.06.16
 * Time: 21:08
 */

namespace First\Core\MVC;


use First\Interfaces\IView;

class View implements IView
{
    private $_view;
    private $_data = [];

    /**
     * @param string $view template name
     * @return View
     */
    public function set($view)
    {
        $this->setView($view);

        return $this;
    }

    /**
     * @param string $key name
     * @param mixed $value content
     */
    public function withKey($key, $value)
    {
        $this->setData([$key => $value]);
    }

    /**
     * @param array $data content
     */
    public function with(array $data)
    {
        $this->setData($data);
    }

    /**
     * @return mixed
     */
    public function getView()
    {
        return $this->_view;
    }

    /**
     * @param mixed $view
     */
    private function setView($view)
    {
        $this->_view = $view;
    }

    /**
     * @return array
     */
    protected function getData()
    {
        return $this->_data;
    }

    /**
     * @param array $data
     */
    private function setData(array $data)
    {
        $this->_data = array_merge($this->_data, $data);
    }

}