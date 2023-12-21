<?php

namespace App\Models;

class User extends Model {
    static $table = 'users';
    public $id;
    public $email;
    public $password;
    
    public static function auth(){
        if(isset($_SESSION['user_id'])){
          return self::find($_SESSION['user_id']);
        }
        return null;
    }
}