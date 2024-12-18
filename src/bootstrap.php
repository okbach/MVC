<?php


$basePath = dirname(__DIR__);

$autoloadPath = $basePath . '/vendor/autoload.php';
$envPath = $basePath . '/env.php';

if (file_exists($autoloadPath)) {
    require $autoloadPath;
} else {
    die('Autoload file not found.');
}

if (file_exists($envPath)) {
    require $envPath;
} else {
    die('Environment file not found.');
}


use Illuminate\Database\Capsule\Manager as Capsule;


$capsule = new Capsule;

// إعداد الاتصال بقاعدة البيانات
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => host,
    'database'  => db_name,
    'username'  => user,
    'password'  => pass,
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

// جعل Eloquent متاحًا عالمياً
$capsule->setAsGlobal();
$capsule->bootEloquent();
