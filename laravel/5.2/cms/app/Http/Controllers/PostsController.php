<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest(); // using scopes
        //$posts = Post::all();
        //$posts = Post::latest()->get(); // default laravel
        //$posts = Post::orderBy('id', 'desc')->get();
        //$posts = Post::orderBy('id', 'asc')->get();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        // return all
        //return $request->all();

        // return specific parameter
        //return $request->get('title');
        //return $request->title;

        // create first option
        //Post::create($request->all());

        // create second option
        //$input = $request->all();
        //$input['title'] = $request->title;

        //Post::create($request->all);

        // create third option
        //$post = new Post;
        //$post->title = $request->title;
        //$post->save();

        /*
        $file = $request->file('file');

        echo '<br>';

        echo $file->getClientOriginalName();
        echo $file->getClientSize();
         */

        $input = $request->all();

        if ($file = $request->file('file')) {
            $name = $file->getClientOriginalName();

            $file->move('images', $name);

            $input['path'] = $name;
        }

        Post::create($input);

        //Post::create($request->all());

        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('posts.edit', compact('post'));
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
        $post = Post::findOrFail($id);

        $post->update($request->all());

        return redirect('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::whereId($id)->delete();

        return redirect('posts');
    }

    public function contact()
    {
        $people = ['Edwin', 'Jose', 'James', 'Peter', 'Maria'];

        return view('contact', compact('people'));
    }

    public function show_post($id, $name, $password)
    {
        //return view('post')->with('id', $id);

        return view('post', compact('id', 'name', 'password'));
    }
}
