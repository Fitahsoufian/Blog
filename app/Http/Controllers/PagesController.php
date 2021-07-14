<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return view('index');
    }

    public function blog(){
        $data = Post::all();
        return view('blog',['articls'=>$data]);
    }
}
 