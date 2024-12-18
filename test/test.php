<?php

$startTime = microtime(true);

$basePath = dirname(__DIR__);

$autoloadPath = $basePath . '/src/bootstrap.php';

if (file_exists($autoloadPath)) {
    require $autoloadPath;
} else {
    die('Autoload file not found.');
}



use App\Models\User;

// **1. إنشاء مستخدم جديد**
$newUser = User::create([
    'name' => 'Test User',
    'email' => 'testuser@example.com',
    'password' => password_hash('123456', PASSWORD_BCRYPT),
]);

echo "User created successfully! User ID: " . $newUser->id . PHP_EOL;

// **2. جلب جميع المستخدمين**
$users = User::all();
echo "List of users:" . PHP_EOL;
foreach ($users as $user) {
    echo "ID: {$user->id}, Name: {$user->name}, Email: {$user->email}" . PHP_EOL;
}

// **3. تحديث بيانات المستخدم**
$userToUpdate = User::find($newUser->id);
if ($userToUpdate) {
    $userToUpdate->name = 'Updated User';
    $userToUpdate->save();
    echo "User updated successfully! New Name: " . $userToUpdate->name . PHP_EOL;
}


$userToDelete = User::find($newUser->id);
if ($userToDelete) {
    $userToDelete->delete();
    echo "User deleted successfully!" . PHP_EOL;
}


$endTime = microtime(true);
$executionTime = $endTime - $startTime;
echo "Execution time: " . $executionTime . " seconds" . PHP_EOL;
