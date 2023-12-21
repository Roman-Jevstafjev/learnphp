<?php
namespace App\Controllers;

use App\Exceptions\NotFoundException;
use App\Models\Post;

class PostsController {
    public function __construct()
    {
        if(!auth()){
            header('Location: /login');
        }
    }

    public function index(){
        $posts = Post::all();
        view('posts/index', compact('posts'));
    }
    public function create(){
        view('posts/create');
    }
    public function store(){

        $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        var_dump($ext);
        $filename = md5(microtime() . $_FILES['image']['name']) . '.' . $ext;
        move_uploaded_file(
            $_FILES['image']['tmp_name'],
            __DIR__ . '/../../public/uploads/'. $filename
        );
      
        $post = new Post();
        $post->title = $_POST['title'];
        $post->body = $_POST['body'];
        $post->save();
        header('Location: /admin/posts');
    }
    public function show(){
        $post = Post::find($_GET['id']);
        if($post){
            view('posts/show', compact('post'));
        } else {
            throw new NotFoundException();
        }
    }
    public function edit(){
        $post = Post::find($_GET['id']);
        if($post){
            view('posts/edit', compact('post'));
        } else {
            throw new NotFoundException();
        }
    }
    public function update(){
        $post = Post::find($_GET['id']);
        if($post){
            $post->title = $_POST['title'];
            $post->body = $_POST['body'];
            $post->save();
            header('Location: /admin/posts');
        } else {
            throw new NotFoundException();
        }
    }
    public function destroy(){
        $post = Post::find($_GET['id']);
        if($post){
            $post->delete();
            header('Location: /admin/posts');
        } else {
            throw new NotFoundException();
        }
    }
}