<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    // show a specific post by id
    public function show(Post $post)
    {
        // load relations if not already loaded
        $post->loadMissing(['author', 'category']);
        return view('post.show', compact('post'));
    }

    // delete a post by id
    public function delete(Post $post)
    {
        if (Gate::denies('delete', $post)) {
            return redirect()
                ->route('dashboard.index')
                ->withErrors(['auth_error' => 'You are unauthorised to delete this post!']);
        }
        try {
            $post->delete();
            return redirect()->route('dashboard.index')->with('success', 'Post successfully deleted!');
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            return redirect()
                ->route('dashboard.index')
                ->withErrors(['internal_error' => 'An unknown internal error occurred. Try again later or contact the administrator!']);
        }
    }

    // show post creating form
    public function create()
    {
        // fetch categories
        $categories = PostCategory::select('post_category_id', 'post_category_name')->get();
        return view('post.create', compact('categories'));
    }

    // store new post in db
    public function store(StorePostRequest $request)
    {
        if (Gate::denies('create', Post::class)) {
            return redirect()
                ->route('dashboard.index')
                ->withErrors(['auth_error' => 'You are unauthorised to create a post!']);
        }

        try {
            $post = auth()->user()
                ->posts()
                ->create($request->only('post_title', 'post_excerpt', 'post_body', 'category_id'));
            return redirect()
                ->route('post.show', compact('post'))
                ->with('success', 'Post successfully created!');
        } catch (\Throwable $e) {
            Log::error($e->getMessage());
            return redirect()
                ->route('dashboard.index')
                ->withErrors(['internal_error' => 'An unknown internal error occurred. Try again later or contact the administrator!']);
        }
    }

    // show post edit form
    public function edit(Post $post)
    {
        if (Gate::denies('update', $post)) {
            return redirect()
                ->route('dashboard.index')
                ->withErrors(['auth_error' => 'You are unauthorised to update this post!']);
        }

        // fetch categories
        $categories = PostCategory::select('post_category_id', 'post_category_name')
            ->get();

        return view('post.edit', compact('post', 'categories'));
    }

    // update post
    public function update(UpdatePostRequest $request, Post $post)
    {
        if(Gate::denies('update', $post)){
            return redirect()
                ->route('dashboard.index')
                ->withErrors(['auth_error' => 'You are unauthorised to update this post!']);
        }

        try{
            $post->update($request->only('post_title', 'post_excerpt', 'category_id', 'post_body'));
            return redirect()
                ->route('post.show', compact('post'))
                ->with('success', 'Post successfully updated!');
        }catch(\Throwable $e){
            Log::error($e->getMessage());
            return redirect()
                ->route('dashboard.index')
                ->withErrors(['internal_error' => 'An unknown internal error occurred. Try again later or contact the administrator!']);
        }
    }
}
