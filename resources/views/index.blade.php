
@extends('layout/layout')

@section('content')
    <h1>All Posts</h1>
    <a href="{{ route('create') }}" class="btn btn-primary mb-3">+ Create New Post</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($posts->count())
        <div>
            <h2 class="section-title">ภาพรวมหลักสูตร</h2>
        </div>
            @foreach ($posts as $post)
                @if ($post->main === 'main')
                    <div class="card mb-3">
                        <div class="card-body">
                            <h3>{{ $post->title }}</h3>
                            <p>{{ Str::limit($post->content, 100) }}</p>
                            <a href="{{ route('show', $post) }}" class="btn btn-secondary">View</a>
                            <a href="{{ route(name: 'edit', parameters: $post) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route(name: 'delete', parameters: $post) }}" method="POST" style="display:inline" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                @endif
            @endforeach
        <div>
            <h2 class="section-title">กิจกรรมล่าสุด</h2>
        </div>
            @foreach ($posts as $post)
                @if ($post->main === 'main2')
                    <div class="card mb-3">
                        <div class="card-body">
                            <h3>{{ $post->title }}</h3>
                            <p>{{ Str::limit($post->content, 100) }}</p>
                            <a href="{{ route('show', $post) }}" class="btn btn-secondary">View</a>
                            <a href="{{ route(name: 'edit', parameters: $post) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route(name: 'delete', parameters: $post) }}" method="POST" style="display:inline" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                @endif
            @endforeach
    @else
        <div class="alert alert-info">ยังไม่มีโพสในระบบ</div>
    @endif
@endsection