<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only(['home','blogPost','create']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }
    public function home()
    {   $posts=post::join('users','users.id','=','posts.user_id')
        ->select('posts.*','users.name as name')
        ->get()->take(6);
        return view('home',compact('posts'));
    }
    public function create(){
        return view('post.createPost');
    }
}