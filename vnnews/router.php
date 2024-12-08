<?php
class Router
{
    private $routes = [];
    private $basePath = '';

    // Thiết lập base path
    public function __construct()
    {
        $this->basePath = dirname($_SERVER['SCRIPT_NAME']); // Lấy gốc URL
    }

    // Đăng ký một route
    public function addRoute($method, $path, $callback)
    {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'callback' => $callback,
        ];
    }

    // Chuẩn hóa URI
    private function getNormalizedUri()
    {
        $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        if (strpos($requestUri, $this->basePath) === 0) {
            $requestUri = substr($requestUri, strlen($this->basePath));
        }
        return '/' . ltrim($requestUri, '/'); // Đảm bảo luôn có dấu "/"
    }

    // Xử lý route
    public function dispatch()
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $normalizedUri = $this->getNormalizedUri();

        foreach ($this->routes as $route) {
            $pattern = preg_replace('#\{[a-zA-Z0-9_]+\}#', '([a-zA-Z0-9_-]+)', $route['path']);
            $pattern = "#^" . $pattern . "$#";


            if ($route['method'] === $requestMethod && preg_match($pattern, $normalizedUri, $matches)) {
                array_shift($matches);
                return call_user_func_array($route['callback'], $matches);
            }
        }

        http_response_code(404);
        echo "404 Not Found";
    }
}