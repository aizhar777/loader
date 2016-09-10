<?php

namespace First\Core\HTTP;

use First\Interfaces\Req;

class Request implements Req
{
    private $_url;

    private $_part = array();


    /**
     * Request constructor.
     */
    public function __construct()
    {
        $url = $_SERVER['REQUEST_URI'];


        $this->_url = urldecode($url);
        $this->_part = array();

        foreach (explode('/', $this->_url) as $k => $v) {
            if (!empty($v)) {
                $v = explode(':', $v);
                if (!isset($v[1])) {
                    $this->_part[] = $v[0];
                } else {
                    $this->_part[$v[0]] = implode(':', array_slice($v, 1));
                }
            }
        }
    }

    /**
     * return value from request
     *      get(0),
     *      get(0, 'default', Type::T_STRING)
     *      get('test', 0, Type::T_INTEGER)
     * @param string $key
     * @param mixed $default
     * @param string $type
     * @return mixed|null
     * @throws null
     */
    public function get($key, $default = null, $type = null)
    {
        if (isset($this->_part[$key])) {

            if ($type) {
                if (!is_array($type)) {
                    return call_user_func_array(array('Type', 'to' . ucfirst($type)), array($this->_part[$key]));
                } else {
                    return call_user_func_array(array('Type', 'to' . ucfirst($type[0])),
                        array($this->_part[$key]) + $type[1]);
                }

            } else {
                return $this->_part[$key];
            }

        } else {

            if (is_object($default) && $default instanceof \Exception) {
                throw $default;
            } else {
                return $default;
            }

        }
    }

    /**
     * @param $key
     * @return bool
     */
    public function has($key)
    {
        return isset($this->_part[$key]);
    }

    /**
     * @return bool
     */
    public function isAjax()
    {
        if (
            isset($_SERVER['HTTP_X_REQUESTED_WITH'])
            && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest'
        ) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return array
     */
    public function getParts()
    {
        return $this->_part;
    }


}