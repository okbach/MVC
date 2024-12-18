<?php

$basePath = dirname(__DIR__);

$autoloadPath = $basePath . '/src/bootstrap.php';
$envPath = $basePath . '/env.php';

//$xx = realpath($autoloadPath);
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


use Illuminate\Database\Capsule\Manager as Capsule;

// لا حاجة لإعادة تعريف الاتصال بقاعدة البيانات هنا؛ تم إعداد الاتصال في bootstrap.php مسبقًا

// جدول الأدوار
Capsule::schema()->create('roles', function ($table) {
    $table->increments('id');
    $table->string('name');  // اسم الدور (admin, user, إلخ)
    $table->timestamps();
});

// جدول الأذونات
Capsule::schema()->create('permissions', function ($table) {
    $table->increments('id');
    $table->string('name');  // اسم الإذن (مثل create_article, delete_user)
    $table->timestamps();
});

// جدول المستخدمين
Capsule::schema()->create('users', function ($table) {
    $table->increments('id');
    $table->string('name');
    $table->string('email')->unique();
    $table->string('password');
    $table->string('api_token', 80)->unique()->nullable();
    $table->timestamps();
});

// جدول الاشتراكات
Capsule::schema()->create('subscriptions', function ($table) {
    $table->increments('id');
    $table->string('name');             // اسم الاشتراك
    $table->decimal('price', 8, 2);     // السعر
    $table->string('duration');         // مدة الاشتراك (شهري، ربع سنوي، سنوي، إلخ)
    $table->timestamps();
});

// جدول المستخدمين - الاشتراكات
Capsule::schema()->create('user_subscriptions', function ($table) {
    $table->increments('id');
    $table->integer('user_id')->unsigned();          // معرف المستخدم
    $table->integer('subscription_id')->unsigned();   // معرف الاشتراك
    $table->timestamp('start_date');                  // تاريخ بداية الاشتراك
    $table->timestamp('end_date');                    // تاريخ نهاية الاشتراك
    $table->timestamps();

    // العلاقة بين المستخدمين والاشتراكات
    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    $table->foreign('subscription_id')->references('id')->on('subscriptions')->onDelete('cascade');
});

// جدول طرق الدفع (Payment Methods)
Capsule::schema()->create('payment_methods', function ($table) {
    $table->increments('id');
    $table->string('name');                    // اسم طريقة الدفع (مثل "بطاقة ائتمان"، "باي بال")
    $table->decimal('exchange_rate', 8, 4);    // سعر الصرف
    $table->boolean('is_active')->default(true); // هل طريقة الدفع مفعلة أم لا
    $table->timestamps();
});

// جدول الدفعات (Payments)
Capsule::schema()->create('payments', function ($table) {
    $table->increments('id');
    $table->integer('user_id')->unsigned();          // معرف المستخدم
    $table->decimal('amount', 8, 2);                  // مبلغ الدفع
    $table->timestamp('payment_date');                // تاريخ الدفع
    $table->integer('payment_method_id')->unsigned(); // معرف طريقة الدفع (رابط لجدول طرق الدفع)
    $table->timestamps();

    // العلاقة مع المستخدم
    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    // العلاقة مع طريقة الدفع
    $table->foreign('payment_method_id')->references('id')->on('payment_methods')->onDelete('cascade');
});

// ربط الأدوار بالمستخدمين
Capsule::schema()->create('role_user', function ($table) {
    $table->integer('role_id')->unsigned();    // معرف الدور
    $table->integer('user_id')->unsigned();    // معرف المستخدم
    $table->timestamps();

    // العلاقات بين الجداول
    $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
});

// ربط الأذونات بالأدوار
Capsule::schema()->create('permission_role', function ($table) {
    $table->integer('permission_id')->unsigned();   // معرف الإذن
    $table->integer('role_id')->unsigned();         // معرف الدور
    $table->timestamps();

    // العلاقات بين الجداول
    $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
    $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
});

echo "Tables created successfully!";