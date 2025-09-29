@extends('layout/layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="mb-0">Create New Post</h2>
                </div>
                <div class="card-body">
                    @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Please fix the following errors:</strong>
                        <ul class="mb-0 mt-2">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif

                    <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label for="image" class="form-label fw-bold">Upload Image <span class="text-danger">*</span></label>
                            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" accept="image/*" required>
                            <div class="form-text">Upload an image file (JPG, PNG, GIF, WEBP, etc.) - Max size: 2MB</div>
                            @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="main" class="form-label fw-bold">Category <span class="text-danger">*</span></label>
                            <select name="main" id="main" class="form-select @error('main') is-invalid @enderror" required>
                                <option value="">Select Category</option>
                                <option value="1" {{ old('main') == '1' ? 'selected' : '' }}>ภาพรวมหลักสูตร (Course Overview)</option>
                                <option value="2" {{ old('main') == '2' ? 'selected' : '' }}>กิจกรรมที่น่าสนใจ (Interesting Activities)</option>
                                <option value="3" {{ old('main') == '3' ? 'selected' : '' }}>อาจารย์ผู้สอน (Teachers)</option>
                                <option value="4" {{ old('main') == '4' ? 'selected' : '' }}>ผลงานนักศึกษา (Student Works)</option>
                                <option value="5" {{ old('main') == '5' ? 'selected' : '' }}>ศิษย์เก่าเด่น (Outstanding Alumni)</option>
                            </select>
                            <div class="form-text">Choose which section this post belongs to</div>
                            @error('main')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="title" class="form-label fw-bold">Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror" placeholder="Enter post title" required>
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="content" class="form-label fw-bold">Content <span class="text-danger">*</span></label>
                            <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" rows="8" placeholder="Enter post content" required>{{ old('content') }}</textarea>
                            <div class="form-text">Provide detailed information about this post</div>
                            @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2 justify-content-end">
                            <a href="{{ route('admin.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-1"></i> Back to List
                            </a>
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-plus me-1"></i> Create Post
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection