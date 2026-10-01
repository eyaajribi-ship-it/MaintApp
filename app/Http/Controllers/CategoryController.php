<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function show($slug)
    {
        $category = Category::with('posts.author')->where('slug', $slug)->firstOrFail();

        return view('categories.show', compact('category'));
    }
public function index()
{
    $categories = Category::all();
    return view('categories.index', compact('categories'));
}
}