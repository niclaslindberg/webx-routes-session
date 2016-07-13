<?php

use WebX\Routes\Session\Impl\SessionImpl;
use WebX\Routes\Session\Api\SessionListener;

return [
    "ioc" => [
        "register" => [
            [SessionImpl::class,["types"=>["sessionListeners"=> SessionListener::class]]]
        ]
    ]
];