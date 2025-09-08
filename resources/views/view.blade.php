@extends('layout/layout')

@section('content')
@if($posts->count())

<section class="my-5">
    <h2 class="section-title">ภาพรวมหลักสูตร</h2>
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
                    <a href="{{ route('public.show', $post) }}" class="btn btn-secondary">View</a>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</section>

<section class="my-5">
    <h2 class="section-title">กิจกรรมที่น่าสนใจ</h2>
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
                        <a href="{{ route('public.show', $post) }}" class="btn btn-secondary btn-sm">View</a>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</section>

<section class="my-5">
    <h2 class="section-title">อาจารย์ผู้สอน</h2>
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
                        <a href="{{ route('public.show', $post) }}" class="btn btn-secondary btn-sm">View</a>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</section>

<section class="my-5">
    <h2 class="section-title">ผลงานนักศึกษา</h2>
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
                        <a href="{{ route('public.show', $post) }}" class="btn btn-secondary btn-sm">View</a>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</section>

<section class="my-5">
    <h2 class="section-title">ศิษย์เก่าเด่น</h2>
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
                        <a href="{{ route('public.show', $post) }}" class="btn btn-secondary btn-sm">View</a>
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