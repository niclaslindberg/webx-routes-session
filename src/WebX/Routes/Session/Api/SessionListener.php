<?php

namespace WebX\Routes\Session\Api;

interface SessionListener
{

    /**
     * Invoked by Session prior to rendering the Routes content.
     * @param Session $session
     * @return void
     */
    public function onPreWrite(Session $session);

}