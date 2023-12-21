<?php

use App\Controllers\AuthController;
use App\Controllers\PostsController;
use App\Controllers\UsersController;
use App\Controllers\PublicController;
use App\Router;

Router::get('/', [PublicController::class, 'index']);

Router::get('/about', [PublicController::class, 'about']);
Router::get('/form', [PublicController::class, 'form']);
Router::post('/answer', [PublicController::class, 'answer']);
Router::get('/answer', [PublicController::class, 'getAnswer']);

Router::get('/admin/posts', [PostsController::class, 'index']);
Router::get('/admin/posts/new', [PostsController::class, 'create']);
Router::post('/admin/posts', [PostsController::class, 'store']);
Router::get('/admin/posts/view', [PostsController::class, 'show']);
Router::get('/admin/posts/edit', [PostsController::class, 'edit']);
Router::post('/admin/posts/edit', [PostsController::class, 'update']);
Router::get('/admin/posts/delete', [PostsController::class, 'destroy']);

Router::get('/admin/users', [UsersController::class, 'index']);
Router::get('/admin/users/create', [UsersController::class, 'createForm']);
Router::post('/admin/users/create', [UsersController::class, 'create']);
Router::get('/admin/users/view', [UsersController::class, 'show']);
Router::get('/admin/users/delete', [UsersController::class, 'delete']);
Router::get('/admin/users/edit', [UsersController::class, 'updateForm']);
Router::post('/admin/users/edit', [UsersController::class, 'update']);

Router::get('/register', [AuthController::class, 'registerForm']);
Router::post('/register', [AuthController::class, 'register']);
Router::get('/login', [AuthController::class, 'loginForm']);
Router::post('/login', [AuthController::class, 'login']);
Router::get('/logout', [AuthController::class, 'logout']);