<?php

namespace App\Http\Controllers;

use App\Catagory;
use Illuminate\Http\Request;
use App\Post;

use Illuminate\Support\Facades\Session;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.posts.index')->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $catagories = catagory::all();

        if($catagories->count() == 0)
        {

            Session::flash('info', 'you must have some catagories before creating a post');

            return redirect()->back();
        }

        return view('admin.posts.create')->with('Catagories', catagory::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
            $this->validate($request,[
                'title'=>'required|max:255',
                'featured'=> 'required|image',
                'content'=> 'required'
            ]);
        
            $featured = $request->featured;
            
            $featured_new_name = time().getClientOriginalName();
            $featured->move('uploads/posts', $featured_new_name);

            $post = new post;
        //$post::create([]);
            $post->create([
                'title' => $request->title,
                'content' => $request-> content,
                'featured'=>('uploads/posts').$featured_new_name,
                'catagory'=>$request->catagory_id,
                'slug'=>str_slug($request->title)
            ]);

        Session::flash('success', 'post created successfully');

    return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();

        Session::flash('success', 'the post is successfully deleleted');

        return redirect()->back();
    }
}
