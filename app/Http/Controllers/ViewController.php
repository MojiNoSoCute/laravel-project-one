<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    /**
     * Display the public view of all posts.
     */
    public function view()
    {
        $posts = Post::all();
        return view('view', compact('posts'));
    }

    /**
     * Display the course guide page.
     */
    public function courseGuide()
    {
        // We're only showing static program information on this page
        return view('course-guide');
    }

    /**
     * Display the specified resource for public viewing.
     */
    public function show(Post $post)
    {
        return view('show', compact('post'));
    }
}