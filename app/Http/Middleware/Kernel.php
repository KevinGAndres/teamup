<?php

protected $routeMiddleware = [
    // ...
    'check.role' => \App\Http\Middleware\CheckRole::class,
];