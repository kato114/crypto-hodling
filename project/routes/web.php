<?php
// ************************************ ADMIN SECTION **********************************************
Route::prefix('admin')->group(function ()
{    
    Route::get('/', 'Admin\DashboardController@index')->name('admin.dashboard');

    Route::get('/login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Admin\LoginController@login')->name('admin.login.submit');
    Route::get('/forgot', 'Admin\LoginController@showForgotForm')->name('admin.forgot');
    Route::post('/forgot', 'Admin\LoginController@forgot')->name('admin.forgot.submit');
    Route::get('/logout', 'Admin\LoginController@logout')->name('admin.logout');

    Route::get('/profile', 'Admin\DashboardController@profile')->name('admin.profile');
    Route::post('/profile/update', 'Admin\DashboardController@profileupdate')->name('admin.profile.update');
    Route::get('/password', 'Admin\DashboardController@passwordreset')->name('admin.password');
    Route::post('/password/update', 'Admin\DashboardController@changepass')->name('admin.password.update');

    Route::get('/user/notf/show', 'Admin\NotificationController@user_notf_show')->name('user-notf-show');
    Route::get('/user/notf/count', 'Admin\NotificationController@user_notf_count')->name('user-notf-count');
    Route::get('/user/notf/clear', 'Admin\NotificationController@user_notf_clear')->name('user-notf-clear');

    Route::get('/users/datatables', 'Admin\UserController@datatables')->name('admin-user-datatables'); //JSON REQUEST
    Route::get('/users', 'Admin\UserController@index')->name('admin-user-index');
    Route::get('/users/delete/{id}', 'Admin\UserController@destroy')->name('admin-user-delete');
    Route::get('/user/{id}/show', 'Admin\UserController@show')->name('admin-user-show');
    Route::get('/user/default/image', 'Admin\UserController@image')->name('admin-user-image');

    Route::get('/portfolios/datatables', 'Admin\PortfolioController@datatables')->name('admin-portfolio-datatables'); //JSON REQUEST
    Route::get('/portfolios', 'Admin\PortfolioController@index')->name('admin-portfolio-index');
    Route::get('/portfolios/delete/{id}', 'Admin\PortfolioController@destroy')->name('admin-portfolio-delete');
    Route::get('/portfolio/{id}/show', 'Admin\PortfolioController@show')->name('admin-portfolio-show');

    Route::get('/portfolios/coin/datatables', 'Admin\CoinController@datatables')->name('admin-coin-datatables'); //JSON REQUEST
    Route::get('/portfolios/coin', 'Admin\CoinController@index')->name('admin-coin-index');
    Route::get('/portfolios/coin/create', 'Admin\CoinController@create')->name('admin-coin-create');
    Route::post('/portfolios/coin/create', 'Admin\CoinController@store')->name('admin-coin-store');
    Route::get('/portfolios/coin/edit/{id}', 'Admin\CoinController@edit')->name('admin-coin-edit');
    Route::post('/portfolios/coin/edit/{id}', 'Admin\CoinController@update')->name('admin-coin-update');
    Route::get('/portfolios/coin/delete/{id}', 'Admin\CoinController@destroy')->name('admin-coin-delete');
    Route::get('/products/coin/{id1}/{id2}', 'Admin\CoinController@status')->name('admin-coin-status');

    Route::get('/blog/datatables', 'Admin\BlogController@datatables')->name('admin-blog-datatables'); //JSON REQUEST
    Route::get('/blog', 'Admin\BlogController@index')->name('admin-blog-index');
    Route::get('/blog/create', 'Admin\BlogController@create')->name('admin-blog-create');
    Route::post('/blog/create', 'Admin\BlogController@store')->name('admin-blog-store');
    Route::get('/blog/edit/{id}', 'Admin\BlogController@edit')->name('admin-blog-edit');
    Route::post('/blog/edit/{id}', 'Admin\BlogController@update')->name('admin-blog-update');
    Route::get('/blog/delete/{id}', 'Admin\BlogController@destroy')->name('admin-blog-delete');

    Route::get('/blog/category/datatables', 'Admin\BlogCategoryController@datatables')->name('admin-cblog-datatables'); //JSON REQUEST
    Route::get('/blog/category', 'Admin\BlogCategoryController@index')->name('admin-cblog-index');
    Route::get('/blog/category/create', 'Admin\BlogCategoryController@create')->name('admin-cblog-create');
    Route::post('/blog/category/create', 'Admin\BlogCategoryController@store')->name('admin-cblog-store');
    Route::get('/blog/category/edit/{id}', 'Admin\BlogCategoryController@edit')->name('admin-cblog-edit');
    Route::post('/blog/category/edit/{id}', 'Admin\BlogCategoryController@update')->name('admin-cblog-update');
    Route::get('/blog/category/delete/{id}', 'Admin\BlogCategoryController@destroy')->name('admin-cblog-delete');

    Route::get('/general-settings/logo', 'Admin\GeneralSettingController@logo')->name('admin-gs-logo');
    Route::get('/general-settings/favicon', 'Admin\GeneralSettingController@fav')->name('admin-gs-fav');
    Route::get('/general-settings/loader', 'Admin\GeneralSettingController@load')->name('admin-gs-load');

    Route::post('/general-settings/update/all', 'Admin\GeneralSettingController@generalupdate')->name('admin-gs-update');
    Route::get('/general-settings/loader/{status}', 'Admin\GeneralSettingController@isloader')->name('admin-gs-isloader');
    Route::get('/general-settings/admin/loader/{status}', 'Admin\GeneralSettingController@isadminloader')->name('admin-gs-is-admin-loader');

    Route::get('/email-templates/datatables', 'Admin\EmailController@datatables')->name('admin-mail-datatables');
    Route::get('/email-templates', 'Admin\EmailController@index')->name('admin-mail-index');
    Route::get('/email-templates/{id}', 'Admin\EmailController@edit')->name('admin-mail-edit');
    Route::post('/email-templates/{id}', 'Admin\EmailController@update')->name('admin-mail-update');
    Route::get('/email-config', 'Admin\EmailController@config')->name('admin-mail-config');
    Route::get('/groupemail', 'Admin\EmailController@groupemail')->name('admin-group-show');
    Route::post('/groupemailpost', 'Admin\EmailController@groupemailpost')->name('admin-group-submit');
    Route::get('/issmtp/{status}', 'Admin\GeneralSettingController@issmtp')->name('admin-gs-issmtp');

    Route::get('/cache/clear', function (){
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('route:clear');
        Artisan::call('view:clear');
        return redirect()->route('admin.dashboard')->with('cache', 'System Cache Has Been Removed.');
    })->name('admin-cache-clear');

    Route::get('/check/movescript', 'Admin\DashboardController@movescript')->name('admin-move-script');
    Route::get('/generate/backup', 'Admin\DashboardController@generate_bkup')->name('admin-generate-backup');
    Route::get('/activation', 'Admin\DashboardController@activation')->name('admin-activation-form');
    Route::post('/activation', 'Admin\DashboardController@activation_submit')->name('admin-activate-purchase');
    Route::get('/clear/backup', 'Admin\DashboardController@clear_bkup')->name('admin-clear-backup');
});

Route::prefix('user')->group(function ()
{
    Route::get('/dashboard', 'Dashboard\DashboardController@index')->name('dashboard');
    Route::get('/hodl', 'Dashboard\DashboardController@hodl')->name('hodl');
    Route::post('/hodl', 'Dashboard\DashboardController@add_hodl')->name('hodl');
    Route::get('/charts', 'Dashboard\DashboardController@charts')->name('charts');
    Route::get('/settings', 'Dashboard\DashboardController@settings')->name('settings');
    Route::get('/profile/{coin}', 'Dashboard\DashboardController@profile')->name('profile');
    Route::patch('/profile/{user}/update', 'Dashboard\DashboardController@update_profile')->name('update_profile');
    Route::patch('/profile/{user}/image/update', 'Dashboard\DashboardController@update_profile_image')->name('update_image_profile');
    Route::get('/follow/{user}', 'Dashboard\DashboardController@update_follow_status')->name('follow');
    Route::get('/portfolio', 'Dashboard\DashboardController@portfolio')->name('portfolio');
    Route::get('/activity', 'Dashboard\DashboardController@activity')->name('activity');

    Route::get('/service', 'Dashboard\PagesController@service')->name('service');
    Route::get('/blog', 'Dashboard\PagesController@blog')->name('blog');
    Route::get('/blog/{id}/show', 'Dashboard\PagesController@blogShow')->name('blogShow');
    Route::get('/about', 'Dashboard\PagesController@about')->name('about');

});

Route::group(['middleware' => 'maintenance'], function ()
{
    Route::get('/', 'Front\FrontendController@index')->name('home');

    Route::get('/login', 'Front\FrontendController@login')->name('login');
    Route::post('/login', 'Front\FrontendController@loginSubmit')->name('login.submit');

    Route::get('/register', 'Front\FrontendController@register')->name('register');
    Route::post('/register', 'Front\FrontendController@registerSubmit')->name('register.submit');

    Route::get('/logout', 'Front\FrontendController@logout')->name('logout');

    Route::get('/cron_job', 'Front\FrontendController@cron_job')->name('cron_job');
    Route::get('/update_prices', 'Front\FrontendController@update_coin_price')->name('coin_price');
    Route::get('/update_portfolio', 'Front\FrontendController@update_portfolio_status')->name('coin_price');
});

