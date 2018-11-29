<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2aa62ca7900cf9d7c7258cee3d36ecdf
{
    public static $classMap = array (
        'Account' => __DIR__ . '/../..' . '/models/account.class.php',
        'AccountController' => __DIR__ . '/../..' . '/controllers/account_controller.class.php',
        'AccountDetail' => __DIR__ . '/../..' . '/views/account/detail/account_detail.class.php',
        'AccountIndex' => __DIR__ . '/../..' . '/views/account/index/account_index.class.php',
        'AccountIndexView' => __DIR__ . '/../..' . '/views/account/account_index_view.class.php',
        'AccountModel' => __DIR__ . '/../..' . '/models/account_model.class.php',
        'Admin' => __DIR__ . '/../..' . '/models/admin.class.php',
        'AdminAdd' => __DIR__ . '/../..' . '/views/admin/add/admin_add.class.php',
        'AdminController' => __DIR__ . '/../..' . '/controllers/admin_controller.class.php',
        'AdminError' => __DIR__ . '/../..' . '/views/admin/error/admin_error.class.php',
        'AdminIndex' => __DIR__ . '/../..' . '/views/admin/index/admin_index.class.php',
        'AdminIndexView' => __DIR__ . '/../..' . '/views/admin/admin_index_view.class.php',
        'AdminModel' => __DIR__ . '/../..' . '/models/admin_model.class.php',
        'AdminSearch' => __DIR__ . '/../..' . '/views/admin/search/admin_search.class.php',
        'Balance' => __DIR__ . '/../..' . '/models/balance.class.php',
        'BalanceModel' => __DIR__ . '/../..' . '/models/balance_model.class.php',
        'ComposerAutoloaderInit2aa62ca7900cf9d7c7258cee3d36ecdf' => __DIR__ . '/..' . '/composer/autoload_real.php',
        'Composer\\Autoload\\ClassLoader' => __DIR__ . '/..' . '/composer/ClassLoader.php',
        'Composer\\Autoload\\ComposerStaticInit2aa62ca7900cf9d7c7258cee3d36ecdf' => __DIR__ . '/..' . '/composer/autoload_static.php',
        'Database' => __DIR__ . '/../..' . '/application/database.class.php',
        'Dispatcher' => __DIR__ . '/../..' . '/application/dispatcher.class.php',
        'IndexView' => __DIR__ . '/../..' . '/views/index_view.class.php',
        'UserController' => __DIR__ . '/../..' . '/controllers/user_controller.class.php',
        'UserDashboardView' => __DIR__ . '/../..' . '/views/user/dashboard/user_dashboard.class.php',
        'UserIndexView' => __DIR__ . '/../..' . '/views/user/user_index_view.class.php',
        'UserLoginVerifyView' => __DIR__ . '/../..' . '/views/user/login/user_login_verify.class.php',
        'UserLoginView' => __DIR__ . '/../..' . '/views/user/login/user_login.class.php',
        'UserModel' => __DIR__ . '/../..' . '/models/user_model.class.php',
        'WelcomeController' => __DIR__ . '/../..' . '/controllers/welcome_controller.class.php',
        'WelcomeIndex' => __DIR__ . '/../..' . '/views/welcome/welcome_index.class.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit2aa62ca7900cf9d7c7258cee3d36ecdf::$classMap;

        }, null, ClassLoader::class);
    }
}
