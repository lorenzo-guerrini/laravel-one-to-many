<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;

class PostController extends Controller
{
    protected $validation = [
        'title' => 'required|max:255',
        'content' => 'required',
    ];

    protected function getSlug($title = "", $id = "")
    {
        $tmpSlug = Str::slug($title);
        $count = 1;
        while (Post::where('slug', $tmpSlug)->where('id', '!=', $id)->first()) {
            $tmpSlug = Str::slug($title) . "-" . $count;
            $count++;
        }
        return $tmpSlug;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validation);

        $form_data = $request->all();

        // $slug = Str::slug($form_data['title']);
        // $count = 1;
        // while (Post::where('slug', $slug)->first()) {
        //     $slug = Str::slug($form_data['title']) . "-" . $count;
        //     $count++;
        // }

        // $form_data['slug'] = $slug;
        $form_data['slug'] = $this->getSlug($form_data["title"]);

        $new_post = new Post();

        $new_post->fill($form_data);
        $new_post->save();

        return redirect()->route('admin.posts.index')->with(['msg' => '<div class="alert alert-success" role="alert">Comic succefully added</div>']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        if (!$post) {
            abort(404);
        }

        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate($this->validation);

        $form_data = $request->all();

        // if ($post->title == $form_data['title']) {
        //     $slug = $post->slug;
        // } else {
        //     $slug = Str::slug($form_data['title']);
        //     $count = 1;
        //     while (Post::where('slug', $slug)->where('id', '!=', $post->id)->first()) {
        //         $slug = Str::slug($form_data['title']) . "-" . $count;
        //         $count++;
        //     }
        // }
        // $form_data['slug'] = $slug;
        $form_data["slug"] = ($post->title == $form_data['title']) ? $post->slug : $this->getSlug($form_data["title"], $post->id);

        $post->update($form_data);
        return redirect()->route('admin.posts.index')->with(['msg' => '<div class="alert alert-success" role="alert">Comic succefully updated</div>']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->with(['msg' => '<div class="alert alert-success" role="alert">Comic succefully deleted</div>']);
    }
}
