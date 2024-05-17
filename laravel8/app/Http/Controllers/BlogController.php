<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::all(); //вызов данных с таблицы
        return view('pages.index', [
            'posts'=>$posts
        ]);
    }
}
