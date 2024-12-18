<?php

require_once 'src/bootstrap.php'; // تحميل الإعدادات والموديل

// نفس كود توجيه الطلبات الذي وضعته
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestMethod = $_SERVER['REQUEST_METHOD'];


echo "$requestUri <br>" ;

if ($requestUri === '/' && $requestMethod === 'GET') {
    echo '/views/home.php';
    require __DIR__ . '/src/views/home.php';
} elseif ($requestUri === '/users' && $requestMethod === 'GET') {
    echo '/users';
    (new \App\Controllers\UserController)->index();
} elseif ($requestUri === '/src/users/create' && $requestMethod === 'GET') {

    echo '/users/create';
    require __DIR__ . '/src/views/users/create.php';
} elseif ($requestUri === '/users' && $requestMethod === 'POST') {
    (new \App\Controllers\UserController)->store($_POST);
} elseif (preg_match('/^\/users\/(\d+)\/delete$/', $requestUri, $matches) && $requestMethod === 'POST') {
    $userId = $matches[1];
    (new \App\Controllers\UserController)->destroy($userId);
} else {
    http_response_code(404);
    echo "Page not found";
}
