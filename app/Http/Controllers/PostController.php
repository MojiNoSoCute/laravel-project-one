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
     * Show the form for creating a new resource by category.
     */
    public function createByCategory(Request $request)
    {
        // Determine category from the route
        $routeName = $request->route()->getName();

        $categoryMap = [
            'admin.create.course-overview' => '1',
            'admin.create.interesting-activities' => '2',
            'admin.create.teachers' => '3',
            'admin.create.student-works' => '4',
            'admin.create.outstanding-alumni' => '5'
        ];

        $category = $categoryMap[$routeName] ?? '1';

        // Get category name for display
        $categoryNames = [
            '1' => 'ภาพรวมหลักสูตร',
            '2' => 'กิจกรรมที่น่าสนใจ',
            '3' => 'อาจารย์ผู้สอน',
            '4' => 'ผลงานนักศึกษา',
            '5' => 'ศิษย์เก่าเด่น'
        ];

        $categoryName = $categoryNames[$category];

        return view('admin.create-by-category', compact('category', 'categoryName'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'category' => 'required|in:1,2,3,4,5',
            'title' => 'required|string|max:255|min:3',
            'content' => 'required|string|min:10'
        ], [
            'image.required' => 'กรุณาเลือกภาพที่จะอัปโหลด',
            'image.image' => 'ไฟล์ที่เลือกต้องเป็นไฟล์ภาพ',
            'image.mimes' => 'ไฟล์ภาพต้องเป็นประเภท: jpeg, png, jpg, gif, webp',
            'image.max' => 'ขนาดไฟล์ภาพต้องไม่เกิน 2MB',
            'category.required' => 'กรุณาเลือกหมวดหมู่',
            'category.in' => 'กรุณาเลือกหมวดหมู่ที่ถูกต้อง',
            'title.required' => 'กรุณาใส่ชื่อเรื่อง',
            'title.min' => 'ชื่อเรื่องต้องมีอย่างน้อย 3 ตัวอักษร',
            'title.max' => 'ชื่อเรื่องต้องไม่เกิน 255 ตัวอักษร',
            'content.required' => 'กรุณาใส่เนื้อหา',
            'content.min' => 'เนื้อหาต้องมีอย่างน้อย 10 ตัวอักษร'
        ]);

        $data = $request->only(['title', 'content']);
        $data['main'] = $request->category;

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);
            $data['image'] = 'uploads/' . $imageName;
        }

        Post::create($data);

        return redirect()->route('admin.index')->with('success', 'สร้างโพสต์เรียบร้อยแล้ว!');
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
     * Show the form for editing the specified resource by category.
     */
    public function editByCategory(Request $request, Post $post)
    {
        // Determine category from the route
        $routeName = $request->route()->getName();

        $categoryMap = [
            'admin.edit.course-overview' => '1',
            'admin.edit.interesting-activities' => '2',
            'admin.edit.teachers' => '3',
            'admin.edit.student-works' => '4',
            'admin.edit.outstanding-alumni' => '5'
        ];

        $category = $categoryMap[$routeName] ?? $post->main;

        // Get category name for display
        $categoryNames = [
            '1' => 'ภาพรวมหลักสูตร',
            '2' => 'กิจกรรมที่น่าสนใจ',
            '3' => 'อาจารย์ผู้สอน',
            '4' => 'ผลงานนักศึกษา',
            '5' => 'ศิษย์เก่าเด่น'
        ];

        $categoryName = $categoryNames[$category];

        return view('admin.edit-by-category', compact('post', 'category', 'categoryName'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'category' => 'required|in:1,2,3,4,5',
            'title' => 'required|string|max:255|min:3',
            'content' => 'required|string|min:10'
        ], [
            'image.image' => 'ไฟล์ที่เลือกต้องเป็นไฟล์ภาพ',
            'image.mimes' => 'ไฟล์ภาพต้องเป็นประเภท: jpeg, png, jpg, gif, webp',
            'image.max' => 'ขนาดไฟล์ภาพต้องไม่เกิน 2MB',
            'category.required' => 'กรุณาเลือกหมวดหมู่',
            'category.in' => 'กรุณาเลือกหมวดหมู่ที่ถูกต้อง',
            'title.required' => 'กรุณาใส่ชื่อเรื่อง',
            'title.min' => 'ชื่อเรื่องต้องมีอย่างน้อย 3 ตัวอักษร',
            'title.max' => 'ชื่อเรื่องต้องไม่เกิน 255 ตัวอักษร',
            'content.required' => 'กรุณาใส่เนื้อหา',
            'content.min' => 'เนื้อหาต้องมีอย่างน้อย 10 ตัวอักษร'
        ]);

        $data = $request->only(['title', 'content']);
        $data['main'] = $request->category;

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

        return redirect()->route('admin.index')->with('success', 'อัปเดตโพสต์เรียบร้อยแล้ว!');
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
        return redirect()->route('admin.index')->with('success', 'ลบโพสต์เรียบร้อยแล้ว!');
    }
}
