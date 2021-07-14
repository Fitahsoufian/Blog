<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        // return view('blog')->with('post', Post::orderBy('updated_at', 'DESC')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
    'title'=> 'required',
    'description'=> 'required',
    'image'=> 'required|mimes:jpg,png,jpeg|max:5048'
     ]);

     
     
     Post::create([
        'title' => $request->input('title'),
        'description' => $request->input('description'),
        'slug' => $slug = SlugService:: createSlug(Post::class,'slug', $request->title ),
        'user_id' => auth()->user()->id
     ]);

     return redirect('/blog') ->with('message', 'Your post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {    
        $articl = Post::find($id);
        
        return view('show')->with('articl', $articl);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articl = Post::find($id);
        return view('edit')->with('articl', $articl);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Post $articl)
    {
            
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required'
            
            
        ]);
        // $request->user()->posts()->update($request->only('body'));
        $articl->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        return redirect('blog')->with('message', 'post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articl=Post::find($id);
        $articl->delete();
        return redirect('blog')->with('message', 'your post has been deleted');
    }
}
