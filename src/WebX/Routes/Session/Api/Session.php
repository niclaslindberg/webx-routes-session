<?php

namespace WebX\Routes\Session\Api;

interface Session
{

    /**
     * Sets a persistent
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function setData($key,$value);

    /**
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function setFlashData($key, $value);

    /**
     * @param $key
     * @return mixed
     */
    public function data($key);


    /**
     * 
     * @param $key
     * @return mixed
     */
    public function flashData($key);

}