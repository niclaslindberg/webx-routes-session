<?php

namespace WebX\Routes\Session\Impl;

use WebX\Routes\Api\Request;
use WebX\Routes\Api\Response;
use WebX\Routes\Api\RoutesListener;
use WebX\Routes\Session\Api\Session;

class SessionImpl implements RoutesListener, Session
{
    /**
     * @var Response
     */
    private $response;

    private $cookieName = "session";

    private $state;

    private $flashKey = "__";

    private $flashData = null;

    public function __construct(Response $response, Request $request, array $sessionListeners)
    {
        if($state = json_decode(base64_decode($request->cookie($this->cookieName)),true)) {

            if(isset($state[$this->flashKey])) {
                $this->flashData = $state[$this->flashKey];
                unset($state[$this->flashKey]);
            }
            $this->state = $state;
        } else {
            $this->state = [];
        }
        $this->response = $response;
        $this->sessionListeners = $sessionListeners;
    }

    public function onPreRender() {
        foreach($this->sessionListeners as $sessionListener) {
            $sessionListener->onPreWrite($this);
        }
        $this->response->cookie($this->cookieName,base64_encode(json_encode($this->state)) ?: null);
    }

    public function setData($key, $data)
    {
        $this->state[$key] = $data;
    }

    public function setFlashData($key, $data)
    {
        $this->state[$this->flashKey][$key] = $data;
    }

    public function data($key)
    {
        return isset($this->state[$key]) ? $this->state[$key] : null;
    }

    public function flashData($key)
    {
        return isset($this->flashData[$key]) ? $this->flashData[$key] : null;
    }


}