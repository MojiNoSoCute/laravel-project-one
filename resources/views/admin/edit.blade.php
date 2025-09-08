@extends('layout/layout')

@section('content')
<h1>Edit Post</h1>

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('admin.update', $post) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    @if($post->image)
    <div class="mb-3">
        <label class="form-label">Current Image</label>
        <div>
            <img src="{{ asset($post->image) }}" alt="Current image" class="img-thumbnail" style="max-width: 200px; max-height: 200px;">
        </div>
    </div>
    @endif

    <div class="mb-3">
        <label for="image" class="form-label">Upload New Image (Optional)</label>
        <input type="file" name="image" id="image" class="form-control" accept="image/*">
        <div class="form-text">Leave empty to keep current image. Upload a new image file (JPG, PNG, GIF, etc.) to replace.</div>
    </div>
    <div class="mb-3">
        <label for="main" class="form-label">Category</label>
        <select name="main" id="main" class="form-select" required>
            <option value="">Select Category</option>
            <option value="1" {{ $post->main == '1' ? 'selected' : '' }}>ภาพรวมหลักสูตร</option>
            <option value="2" {{ $post->main == '2' ? 'selected' : '' }}>กิจกรรมล่าสุด</option>
            <option value="2" {{ $post->main == '3' ? 'selected' : '' }}>อาจารย์ผู้สอน</option>
            <option value="2" {{ $post->main == '4' ? 'selected' : '' }}>ผลงานนักศึกษา</option>
            <option value="2" {{ $post->main == '5' ? 'selected' : '' }}>ศิษย์เก่าเด่น</option>
        </select>
        <div class="form-text">Choose which section this post belongs to</div>
    </div>
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" id="title" value="{{ $post->title }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <textarea name="content" id="content" class="form-control" rows="5" required>{{ $post->content }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('admin.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection