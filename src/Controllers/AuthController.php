<?php
namespace App\Controllers;

use App\Models\User;

class AuthController {
    public function registerForm(){
        view('auth/register');
    }

    public function register(){
        if($_POST['password'] === $_POST['password_confirm']){
            $user = new User();
            $user->email = $_POST['email'];
            $user->password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $user->save();
            header('Location: /login');
        } else {
            header('Location: /register');
        }
    }

    public function loginForm(){
        view('auth/login');
    }

    public function login(){
        $user = User::where('email', $_POST['email']);
        if(isset($user[0])){
            $user = $user[0];
            if(password_verify($_POST['password'], $user->password)){
                $_SESSION['user_id'] = $user->id;
                header('Location: /');
            } else {
                header('Location: /login');
            }
        } else {
            header('Location: /login');
        }
    }
    public function logout(){
        unset($_SESSION['user_id']);
        header('Location: /');
    }
}