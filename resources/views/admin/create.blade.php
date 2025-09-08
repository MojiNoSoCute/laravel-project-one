@extends('layout/layout')

@section('content')

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="image" class="form-label">Upload Image</label>
        <input type="file" name="image" id="image" class="form-control" accept="image/*" required>
        <div class="form-text">Upload an image file (JPG, PNG, GIF, etc.)</div>
    </div>
    <div class="mb-3">
        <label for="main" class="form-label">Category</label>
        <select name="main" id="main" class="form-select" required>
            <option value="">Select Category</option>
            <option value="1">ภาพรวมหลักสูตร</option>
            <option value="2">กิจกรรมล่าสุด</option>
            <option value="3">อาจารย์ผู้สอน</option>
            <option value="4">ผลงานนักศึกษา</option>
            <option value="5">ศิษย์เก่าเด่น</option>
        </select>
        <div class="form-text">Choose which section this post belongs to</div>
    </div>
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" id="title" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <textarea name="content" id="content" class="form-control" rows="5" required></textarea>
    </div>
    <button type="submit" class="btn btn-success">Create</button>
    <a href="{{ route('admin.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection