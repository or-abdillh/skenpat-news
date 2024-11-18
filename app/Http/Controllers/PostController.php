<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get posts
        $posts = Post::all();

        return view("posts.index", [
            "posts" => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("posts.my-article");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validation here
        $validated = $request->validate([
            "title" => "required|string",
            "content" => "required|string",
        ]);

        // generate slug using title
        $slug = Str::slug($validated["title"]);

        // insert slug into $validated
        $validated["slug"] = $slug;

        // create post
        $post = new Post($validated);

        // get creator
        $creator = User::find(Auth::user()->id);

        // save post
        $creator->posts()->save($post);

        // redirect to posts.index
        return redirect()->route("posts.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}