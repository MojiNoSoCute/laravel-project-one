@extends('layout/layout')

@section('content')
<h1>All Posts</h1>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

@if($posts->count())

<section class="my-5">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="section-title mb-0">ภาพรวมหลักสูตร</h2>
        <a href="{{ route('admin.create.course-overview') }}" class="btn btn-primary">+ Create New</a>
    </div>
    <div class="row g-4">
        @foreach ($posts as $post)
        @if ($post->main === '1')
        <div class="col-lg-6">
            <div class="card card-custom h-100 p-3">
                @if($post->image)
                <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="img-fluid mb-3 rounded"
                    style="width: 100%; height: 200px; object-fit: cover;">
                @endif
                <div class="card-body">
                    <h3>{{ $post->title }}</h3>
                    <p>{{ Str::limit($post->content, 100) }}</p>
                    <a href="{{ route('admin.show', $post) }}" class="btn btn-secondary">View</a>
                    <a href="{{ route('admin.edit.course-overview', $post) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.destroy', $post) }}" method="POST" style="display:inline"
                        onsubmit="return confirm('Are you sure you want to delete this post?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>

</section>

<section class="my-5">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="section-title mb-0">กิจกรรมที่น่าสนใจ</h2>
        <a href="{{ route('admin.create.interesting-activities') }}" class="btn btn-primary">+ Create New</a>
    </div>
    <div class="row g-4">
        @foreach ($posts as $post)
        @if ($post->main === '2')
        <div class="col-md-6 col-lg-3">
            <div class="card card-custom p-3 h-100">
                @if($post->image)
                <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="img-fluid mb-3 rounded"
                    style="width: 100%; height: 150px; object-fit: cover;">
                @endif
                <div class="card-body">
                    <h4 class="card-title fw-bold">{{ $post->title }}</h4>
                    <p class="card-text">{{ Str::limit($post->content, 100) }}</p>
                    <div class="mt-auto">
                        <a href="{{ route('admin.show', $post) }}" class="btn btn-secondary btn-sm">View</a>
                        <a href="{{ route('admin.edit.interesting-activities', $post) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.destroy', $post) }}" method="POST" style="display:inline"
                            onsubmit="return confirm('Are you sure you want to delete this post?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</section>

<section class="my-5">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="section-title mb-0">อาจารย์ผู้สอน</h2>
        <a href="{{ route('admin.create.teachers') }}" class="btn btn-primary">+ Create New</a>
    </div>
    <div class="row g-4">
        @foreach ($posts as $post)
        @if ($post->main === '3')
        <div class="col-sm-6 col-md-4 col-lg-2-4">
            <div class="card card-custom p-3 h-100 text-center">
                @if($post->image)
                <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="teacher-img mx-auto">
                @endif
                <div class="card-body">
                    <h4 class="card-title fw-bold">{{ $post->title }}</h4>
                    <p class="card-text">{{ Str::limit($post->content, 100) }}</p>
                    <div class="mt-auto">
                        <a href="{{ route('admin.show', $post) }}" class="btn btn-secondary btn-sm">View</a>
                        <a href="{{ route('admin.edit.teachers', $post) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.destroy', $post) }}" method="POST" style="display:inline"
                            onsubmit="return confirm('Are you sure you want to delete this post?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</section>

<section class="my-5">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="section-title mb-0">ผลงานนักศึกษา</h2>
        <a href="{{ route('admin.create.student-works') }}" class="btn btn-primary">+ Create New</a>
    </div>
    <div class="row g-4">
        @foreach ($posts as $post)
        @if ($post->main === '4')
        <div class="col-md-6 col-lg-3">
            <div class="card card-custom p-3 h-100">
                @if($post->image)
                <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="img-fluid mb-3 rounded"
                    style="width: 100%; height: 150px; object-fit: cover;">
                @endif
                <div class="card-body">
                    <h4 class="card-title fw-bold">{{ $post->title }}</h4>
                    <p class="card-text">{{ Str::limit($post->content, 100) }}</p>
                    <div class="mt-auto">
                        <a href="{{ route('admin.show', $post) }}" class="btn btn-secondary btn-sm">View</a>
                        <a href="{{ route('admin.edit.student-works', $post) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.destroy', $post) }}" method="POST" style="display:inline"
                            onsubmit="return confirm('Are you sure you want to delete this post?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</section>

<section class="my-5">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="section-title mb-0">ศิษย์เก่าเด่น</h2>
        <a href="{{ route('admin.create.outstanding-alumni') }}" class="btn btn-primary">+ Create New</a>
    </div>
    <div class="row g-4">
        @foreach ($posts as $post)
        @if ($post->main === '5')
        <div class="col-md-6 col-lg-3">
            <div class="card card-custom p-3 h-100">
                @if($post->image)
                <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="img-fluid mb-3 rounded"
                    style="width: 100%; height: 150px; object-fit: cover;">
                @endif
                <div class="card-body">
                    <h4 class="card-title fw-bold">{{ $post->title }}</h4>
                    <p class="card-text">{{ Str::limit($post->content, 100) }}</p>
                    <div class="mt-auto">
                        <a href="{{ route('admin.show', $post) }}" class="btn btn-secondary btn-sm">View</a>
                        <a href="{{ route('admin.edit.outstanding-alumni', $post) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.destroy', $post) }}" method="POST" style="display:inline"
                            onsubmit="return confirm('Are you sure you want to delete this post?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</section>
@else
<div class="alert alert-info">ยังไม่มีโพสในระบบ</div>
@endif
@endsection