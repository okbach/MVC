<?php

$startTime = microtime(true);

$basePath = dirname(__DIR__);

$autoloadPath = $basePath . '/../fun/crud.php';
$envPath = $basePath . '/env.php';

//$xx = realpath($autoloadPath );
//echo $xx;


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



$host = host;
$db_name = db_name;
$user = user;
$pass = pass;



$db = new PDO("mysql:host=$host;dbname=$db_name", $user, $pass); 
$dynamicCrud = new DynamicCrud();

// **1. إنشاء مستخدم جديد**
$newUserData = [
    'name' => 'Test User',
    'email' => 'testuser@example.com',
    'password' => password_hash('123456', PASSWORD_BCRYPT),
];
$newUserId = $dynamicCrud->insert($db, 'users', $newUserData);

if ($newUserId) {
    echo "User created successfully! User ID: " . $newUserId . PHP_EOL;
} else {
    echo "Failed to create user." . PHP_EOL;
}

// **2. جلب جميع المستخدمين**
$allUsers = $dynamicCrud->fetchall($db, 'users', ['id', 'name', 'email']);
if ($allUsers) {
    echo "List of users:" . PHP_EOL;
    foreach ($allUsers as $user) {
        echo "ID: {$user['id']}, Name: {$user['name']}, Email: {$user['email']}" . PHP_EOL;
    }
} else {
    echo "No users found." . PHP_EOL;
}

// **3. تحديث بيانات المستخدم**
$updateData = ['name' => 'Updated User'];
$updateCondition = ['id' => $newUserId];
$isUpdated = $dynamicCrud->update($db, 'users', $updateData, $updateCondition);

if ($isUpdated) {
    echo "User updated successfully! New Name: Updated User" . PHP_EOL;
} else {
    echo "Failed to update user." . PHP_EOL;
}

// **4. حذف المستخدم**
$deleteCondition = ['id' => $newUserId];
$isDeleted = $dynamicCrud->delete($db, 'users', $deleteCondition);

if ($isDeleted) {
    echo "User deleted successfully!" . PHP_EOL;
} else {
    echo "Failed to delete user." . PHP_EOL;
}

// قياس وقت التنفيذ
$endTime = microtime(true);
$executionTime = $endTime - $startTime;
echo "Execution time: " . $executionTime . " seconds" . PHP_EOL;
