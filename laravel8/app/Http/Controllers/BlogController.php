<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $categories=Category::orderBy('title')->get();
        // $posts = Post::all(); //вызов данных с таблицы
        $posts = Post::paginate(4); //вызов данных с таблицы
        return view('pages.index', [
            'posts'=>$posts,
            'categories'=>$categories,
            // 'currentCategoryNameBlog' => null, // Для главной страницы, где нет конкретной категории
        ]);
    }
    
    public function getPostsByCategory($slug){
        $categories=Category::orderBy('title')->get();
        $currentCategory=Category::where('slug',$slug)->first();

        return view('pages.index', [
            'posts'=>$currentCategory->posts, // можем передать posts т.к. метод в Category.php называется posts
            //мы получим посты конкретной категории
            'categories'=>$categories,
            'currentCategoryNameBlog' => $currentCategory, // Передаем текущую категорию
            
        ]);
    }
}
