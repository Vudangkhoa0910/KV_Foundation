<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    /**
     * Show the home page
     */
    public function home()
    {
        return view('home');
    }

    /**
     * Show the campaigns listing page
     */
    public function campaigns()
    {
        return view('campaigns.index');
    }

    /**
     * Show a specific campaign's details
     */
    public function campaignDetail($campaign)
    {
        return view('campaigns.show', compact('campaign'));
    }

    /**
     * Show the about page
     */
    public function about()
    {
        return view('about');
    }

    /**
     * Show the contact page
     */
    public function contact()
    {
        return view('contact');
    }

    // index dashboard page
    public function index()
    {
        $posts = Post::with('author', 'category')
            ->orderByDesc('created_at')
            ->select(['post_title', 'post_excerpt', 'post_body', 'created_at', 'post_id', 'category_id', 'user_id'])
            ->paginate(10);
        return view('dashboard.index', compact('posts'));
    }

    /**
     * Show the login page
     */
    public function showLogin()
    {
        // if logged in, redirect to dashboard
        if (auth()->check()) return redirect()->route('dashboard.index');

        return view('auth.login');
    }

    /**
     * Show the registration page
     */
    public function showRegister()
    {
        return view('auth.register');
    }
}
