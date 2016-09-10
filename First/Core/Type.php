<?php

namespace First\Core;


class Type
{
    const T_ARRAY = 'array';
    const T_BOOLEAN = 'boolean';
    const T_INTEGER = 'integer';
    const T_FLOAT = 'float';
    const T_STRING = 'string';
    const T_OBJECT = 'object';

    /**
     * @param $value
     * @return array
     */
    static public function toArray($value)
    {
        return (array)$value;
    }

    /**
     * @param $value
     * @return bool
     */
    static public function toBoolean($value)
    {
        return (boolean)$value;
    }

    /**
     * @param $value
     * @return int
     */
    static public function toInteger($value)
    {
        return (int)$value;
    }

    /**
     * @param $value
     * @return float
     */
    static public function toFloat($value)
    {
        return (float)str_replace(',', '.', $value);
    }

    /**
     * @param $value
     * @return string
     */
    static public function toString($value)
    {
        return (string)$value;
    }

    /**
     * @param $value
     * @return object
     */
    static public function toObject($value)
    {
        return (object)$value;
    }
}