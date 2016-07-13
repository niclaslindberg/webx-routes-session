#WebX-Routes Session
Provides session functionality to the WebX Routes framework

##How to install
In your Routes project in the bootstrap action:

composer.json
```json
require : {
    "webx/routes-session" : "0.1.0"
}
```

Minimum WebX/Routes version: 0.6.0

```php
use WebX\Routes\Session\Api\Session;

RoutesBootstrap::run([function(Session $session, Response $response) {
    $count = ($session->data("count") ?: 0) + 1;
    $response->typeJson(["count"=>$count]);
    $session->setData("count",$count);
},"../vendor/webx/routes-session/config/routes"]);

```


