<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index', ['as' => 'home']);
$routes->get('/contact', 'Home::contact', ['as' => 'contact']);
$routes->get('/about', 'Home::about', ['as' => 'about']);

service('auth')->routes($routes);



$routes->group('jobs', function($routes) {


    //jobs
    $routes->get('single-job/(:num)', 'Jobs\JobsController::singleJob/$1', ['as' => 'single.jobs']);
    $routes->get('category/(:any)', 'Jobs\JobsController::category/$1', ['as' => 'category.jobs']);

    //saving jobs
    $routes->post('save-jobs/(:num)', 'Jobs\JobsController::saveJobs/$1', ['as' => 'save.jobs']);


    //applaying for jobs
    $routes->post('apply-jobs/(:num)', 'Jobs\JobsController::applayJobs/$1', ['as' => 'apply.jobs']);


    //searching for jobs

    $routes->post('search-jobs', 'Jobs\JobsController::searchingForJobs', ['as' => 'search.jobs']);

});


$routes->group('users', function($routes) {

    //users
    $routes->get('public-profile/(:num)', 'Users\UsersController::publicProfile/$1', ['as' => 'public.profile.users']);

    //update user profile data
    $routes->get('update-profile', 'Users\UsersController::updateProfile', ['as' => 'update.profile.users']);
    $routes->post('update-profile', 'Users\UsersController::submitUpdateProfile', ['as' => 'submit.profile.users']);


    //update user cv
    $routes->get('update-cv', 'Users\UsersController::updateCV', ['as' => 'update.cv.users']);
    $routes->post('update-cv', 'Users\UsersController::submitUpdateCV', ['as' => 'submit.cv.users']);

    //get user saved jobs and applyed jobs
    $routes->get('saved-jobs', 'Users\UsersController::userSavedJobs', ['as' => 'saved.jobs.users']);
    $routes->get('applyed-jobs', 'Users\UsersController::userApplyedJobs', ['as' => 'applyed.jobs.users']);


});


$routes->get('admins/login', 'Admins\AdminsController::login', ['as' => 'admins.login', 'filter' => 'loginfilter']);
$routes->post('admins/login', 'Admins\AdminsController::checkLogin', ['as' => 'admins.login.check']);


$routes->group('admins', ['filter' => 'authfilter'], function($routes) {

    $routes->get('index', 'Admins\AdminsController::index', ['as' => 'admins.index']);

    $routes->get('logout', 'Admins\AdminsController::logout', ['as' => 'admins.logout']);

    //admins
    $routes->get('all-admins', 'Admins\AdminsController::displayAdmins', ['as' => 'admins.all']);
    $routes->get('create-admins', 'Admins\AdminsController::createAdmins', ['as' => 'admins.create']);
    $routes->post('create-admins', 'Admins\AdminsController::storeAdmins', ['as' => 'admins.store']);


    //categories
    $routes->get('all-categories', 'Admins\AdminsController::displayCategories', ['as' => 'categories.all']);
    $routes->get('create-categories', 'Admins\AdminsController::createCategories', ['as' => 'categories.create']);
    $routes->post('create-categories', 'Admins\AdminsController::storeCategories', ['as' => 'categories.store']);
    $routes->get('edit-categories/(:num)', 'Admins\AdminsController::editCategories/$1', ['as' => 'categories.edit']);
    $routes->post('edit-categories/(:num)', 'Admins\AdminsController::updateCategories/$1', ['as' => 'categories.update']);
    $routes->get('delete-categories/(:num)', 'Admins\AdminsController::deleteCategories/$1', ['as' => 'categories.delete']);



    //JOBS
    $routes->get('all-jobs', 'Admins\AdminsController::displayJobs', ['as' => 'jobs.all']);
    $routes->get('create-jobs', 'Admins\AdminsController::createJobs', ['as' => 'jobs.create']);
    $routes->post('create-jobs', 'Admins\AdminsController::storeJobs', ['as' => 'jobs.store']);
    $routes->get('delete-jobs/(:num)', 'Admins\AdminsController::deleteJobs/$1', ['as' => 'jobs.delete']);

    //apps
    $routes->get('all-apps', 'Admins\AdminsController::displayApps', ['as' => 'apps.all']);

    $routes->get('delete-apps/(:num)', 'Admins\AdminsController::deleteApps/$1', ['as' => 'apps.delete']);







});