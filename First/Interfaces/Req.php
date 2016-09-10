<?php
/**
 * Created by PhpStorm.
 * User: MasterPC
 * Date: 024 24.06.16
 * Time: 17:07
 */

namespace First\Interfaces;


interface Req
{
    function get($key, $default = null, $type = null);
    function has($key);
}