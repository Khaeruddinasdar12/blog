<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Portfolio;
use App\Blog;
use App\Category;
use App\User;
class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $kategori = Category::count();
        $blog = Blog::count();
        $portfolio = Portfolio::count();
        $admin = User::count();

        return view('admin.dashboard',[
            'admin' => $admin,
            'kategori' => $kategori,
            'blog' => $blog,
            'portfolio' => $portfolio
        ]);
    }
}
