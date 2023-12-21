<?php
namespace App\Controllers;

use App\DB;
use App\Models\Post;
use App\Models\User;

class PublicController {
    public function index(){
        $posts = Post::all();
        view('index', compact('posts'));
    }

    public function about(){
        view('about');
    }
}