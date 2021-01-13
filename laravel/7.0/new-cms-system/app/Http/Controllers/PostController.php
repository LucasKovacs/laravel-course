<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    /**
     * Show all posts view
     *
     * @return void
     */
    public function index()
    {
        //$posts = Post::all(); // get all
        //$posts = auth()->user()->posts; // get only for current user
        $posts = auth()->user()->posts()->paginate(5);

        return view('admin.posts.index', ['posts' => $posts]);
    }

    /**
     * Show all posts view
     *
     * @return void
     */
    public function edit(Post $post)
    {
        // 1st option
        //$this->authorize('view', $post);

        // 2nd option
        // if (auth()->user()->can('view', $post)) {
        // }

        return view('admin.posts.edit', ['post' => $post]);
    }

    /**
     * Show a single post view
     *
     * @param Post $post
     * @return void
     */
    public function show(Post $post)
    {
        return view('blog-post', ['post' => $post]);
    }

    /**
     * Show create a new post view
     *
     * @return void
     */
    public function create()
    {
        $this->authorize('create', Post::class);

        return view('admin.posts.create');
    }

    /**
     * Save a post action
     *
     * @return RedirectResponse
     */
    public function store(): RedirectResponse
    {
        $this->authorize('create', Post::class);

        $inputs = request()->validate([
            'title' => 'required|min:8|max:25',
            'post_image' => 'file',
            'body' => 'required',
        ]);

        if (request('post_image')) {
            $inputs['post_image'] = request('post_image')->store('images');
        }

        auth()->user()->posts()->create($inputs);

        session()->flash('post-created-message', 'Post was created');

        return redirect()->route('post.index');
    }

    /**
     * Save a post action
     *
     * @return RedirectResponse
     */
    public function update(Post $post): RedirectResponse
    {
        $inputs = request()->validate([
            'title' => 'required|min:8|max:25',
            'post_image' => 'file',
            'body' => 'required',
        ]);

        if (request('post_image')) {
            $inputs['post_image'] = request('post_image')->store('images');
            //$post->post_image = $inputs['post_image'];
        }

        //$post->title = $inputs['title'];
        //$post->body = $inputs['body'];

        //auth()->user()->posts()->save($post); // option 1
        //$post->save(); // option 2

        //$this->authorize('update', $post);

        $post->update($inputs);

        session()->flash('post-created-message', 'Post was updated');

        return redirect()->route('post.index');
    }

    /**
     * Delete a post
     *
     * @param Post $post
     * @return RedirectResponse
     */
    public function destroy(Post $post, Request $request): RedirectResponse
    {
        // if (auth()->user()->id === $post->user_id) {
        //     $post->delete();
        // }

        $this->authorize('delete', $post);

        $post->delete();

        $request->session()->flash('message', 'Post was deleted');
        //Session::flash('message', 'Post was deleted'); // same thing as above

        return back();
    }
}
