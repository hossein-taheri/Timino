<?php

use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::group(['prefix' => '/api'], function() {

    require_once  "routes/api/auth.php";

    require_once  "routes/api/user.php";

    require_once  "routes/api/timeline.php";

    require_once  "routes/api/event.php";
});
