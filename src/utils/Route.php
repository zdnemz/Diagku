<?php
class Route
{
    private static $routes = [];

    public static function get($uri, $callback)
    {
        self::$routes['GET'][$uri] = $callback;
    }

    public static function post($uri, $callback)
    {
        self::$routes['POST'][$uri] = $callback;
    }

    public static function dispatch($requestedUri)
    {
        $uri = parse_url($requestedUri, PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        if (isset(self::$routes[$method][$uri])) {
            $callback = self::$routes[$method][$uri];

            if (is_array($callback)) {
                $controller = new $callback[0]();
                $method = $callback[1];

                if (method_exists($controller, $method)) {
                    call_user_func([$controller, $method]);
                    return;
                }
            }
        }

        // 404 response
        http_response_code(404);
        echo "404 Not Found";
    }
}
