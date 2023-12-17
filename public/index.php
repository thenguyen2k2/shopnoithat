<?php
use app\core\Application;
use app\controllers\SiteController;
use app\controllers\AuthController;
use app\controllers\AdminController;
use app\controllers\CategoryController;
use app\controllers\ProductController;
use app\controllers\RoleController;
use app\controllers\SupplierController;
use app\model\RegisterModel;
require_once __DIR__.'/../vendor/autoload.php';
require_once '../configs/db.php';

$app = new Application(dirname(__DIR__));
$app->router->get('/contact',[SiteController::class,'contact']);
$app->router->post('/contact',[SiteController::class,'handleContact']);

$app->router->get('/', [SiteController::class,'home']);

$app->router->get('/login',[AuthController::class,'login']);
$app->router->post('/login',[AuthController::class,'login']);

$app->router->get('/register',[AuthController::class,'register']);
$app->router->post('/register',[AuthController::class,'register']);

$app->router->get('/logout',[AuthController::class,'logout']);
$app->router->get('/profile',[AuthController::class,'profile']);

//product
$app->router->get('/detail-product',[ProductController::class,'showDetail']);
$app->router->get('/product',[ProductController::class,'showProduct']);




$app->router->get('/admin',[AdminController::class,'home']);
// category
$app->router->get('/admin/category',[CategoryController::class,'index']);
$app->router->get('/admin/category/add',[CategoryController::class,'add']);
$app->router->post('/admin/category/add',[CategoryController::class,'add']);
$app->router->get('/admin/category/edit',[CategoryController::class,'edit']);
$app->router->post('/admin/category/edit',[CategoryController::class,'edit']);
$app->router->get('/admin/category/remove',[CategoryController::class,'remove']);

// supplier
$app->router->get('/admin/supplier',[SupplierController::class,'index']);
$app->router->get('/admin/supplier/add',[SupplierController::class,'add']);
$app->router->post('/admin/supplier/add',[SupplierController::class,'add']);

$app->router->get('/admin/supplier/edit',[SupplierController::class,'edit']);
$app->router->post('/admin/supplier/edit',[SupplierController::class,'edit']);
$app->router->get('/admin/supplier/remove',[SupplierController::class,'remove']);



$app->router->get('/admin/category',[CategoryController::class,'index']);
$app->router->get('/admin/category/add',[CategoryController::class,'add']);
$app->router->post('/admin/category/add',[CategoryController::class,'add']);
$app->router->get('/admin/category/edit',[CategoryController::class,'edit']);
$app->router->post('/admin/category/edit',[CategoryController::class,'edit']);
$app->router->get('/admin/category/remove',[CategoryController::class,'remove']);

$app->router->get('/admin/role',[RoleController::class,'index']);
$app->router->get('/admin/role/add',[RoleController::class,'add']);
$app->router->post('/admin/role/add',[RoleController::class,'add']);
$app->router->get('/admin/role/edit',[RoleController::class,'edit']);
$app->router->post('/admin/role/edit',[RoleController::class,'edit']);
$app->router->get('/admin/role/remove',[RoleController::class,'remove']);

$app->run();