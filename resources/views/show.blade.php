@extends('layout/layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if($post->image)
                        <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="card-img-top" style="height: 400px; object-fit: cover;">
                    @endif
                    <div class="card-body">
                        <h1 class="card-title">{{ $post->title }}</h1>
                        <p class="text-muted mb-3">
                            <small>Category: 
                                @if($post->main == '1')
                                    ภาพรวมหลักสูตร (Course Overview)
                                @elseif($post->main == '2')
                                    กิจกรรมล่าสุด (Latest Activities)
                                @endif
                            </small>
                        </p>
                        <div class="card-text">
                            {!! nl2br(e($post->content)) !!}
                        </div>
                        <hr>
                        <div class="d-flex gap-2">
                            <a href="{{ route('index')}}" class="btn btn-secondary">Back</a>
                            <a href="{{ route('edit', $post) }}" class="btn btn-warning">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection