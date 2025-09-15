<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'main' => 'required|in:1,2,3,4,5',
            'title' => 'required|string|max:255|min:3',
            'content' => 'required|string|min:10'
        ], [
            'image.required' => 'Please select an image to upload.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, webp.',
            'image.max' => 'The image size must not exceed 2MB.',
            'main.required' => 'Please select a category.',
            'main.in' => 'Please select a valid category.',
            'title.required' => 'The title field is required.',
            'title.min' => 'The title must be at least 3 characters.',
            'title.max' => 'The title must not exceed 255 characters.',
            'content.required' => 'The content field is required.',
            'content.min' => 'The content must be at least 10 characters.'
        ]);

        $data = $request->only(['main', 'title', 'content']);

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);
            $data['image'] = 'uploads/' . $imageName;
        }

        Post::create($data);

        return redirect()->route('admin.index')->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('admin.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'main' => 'required|in:1,2,3,4,5',
            'title' => 'required|string|max:255|min:3',
            'content' => 'required|string|min:10'
        ], [
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, webp.',
            'image.max' => 'The image size must not exceed 2MB.',
            'main.required' => 'Please select a category.',
            'main.in' => 'Please select a valid category.',
            'title.required' => 'The title field is required.',
            'title.min' => 'The title must be at least 3 characters.',
            'title.max' => 'The title must not exceed 255 characters.',
            'content.required' => 'The content field is required.',
            'content.min' => 'The content must be at least 10 characters.'
        ]);

        $data = $request->only(['main', 'title', 'content']);

        // Handle image upload if new image is provided
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($post->image && file_exists(public_path($post->image))) {
                unlink(public_path($post->image));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);
            $data['image'] = 'uploads/' . $imageName;
        }

        $post->update($data);

        return redirect()->route('admin.index')->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // Delete associated image file if it exists
        if ($post->image && file_exists(public_path($post->image))) {
            unlink(public_path($post->image));
        }

        $post->delete();
        return redirect()->route('admin.index')->with('success', 'Post deleted successfully!');
    }
}
