<?php
namespace App\Controllers;

use App\Models\User;

class UsersController {
    public function __construct() {
        if(!auth()) {
            header('Location: /login');
        }
    }

    public function index(){
        $users = User::all();
        view('users/index', compact('users'));
    }

    public function createForm(){
        view('users/create');
    }

    public function create() {
        $user = new User();
        $user->email = $_POST['email'];
        $user->password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $user->save();

        header('Location: /admin/users');
    }

    public function show() {
        $user = User::find($_REQUEST["id"]);
        if($user == null) {
            throw new NotFoundException();
        }

        view('users/show', compact('user'));
    }

    public function delete(){
        $user = User::find($_REQUEST["id"]);
        if($user == null) {
            throw new NotFoundException();
        }

        $user->delete();
        header('Location: /admin/users');
    }

    public function updateForm() {
        $user = User::find($_REQUEST["id"]);
        if($user == null) {
            throw new NotFoundException();
        }

        view('users/edit', compact('user'));
    }

    public function update() {
        $user = User::find($_REQUEST["id"]);
        if($user == null) {
            throw new NotFoundException();
        }
        
        $user->email = $_POST['email'];
        $user->save();
        header('Location: /admin/users');
    }
}