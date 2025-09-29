@extends('layout/layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="mb-0">แก้ไขโพสต์ - {{ $categoryName }}</h2>
                </div>
                <div class="card-body">
                    @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>กรุณาแก้ไขข้อผิดพลาดต่อไปนี้:</strong>
                        <ul class="mb-0 mt-2">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif

                    <form action="{{ route('admin.update', $post) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Hidden field for category -->
                        <input type="hidden" name="category" value="{{ $category }}">

                        @if($post->image)
                        <div class="mb-4">
                            <label class="form-label fw-bold">ภาพปัจจุบัน</label>
                            <div class="border rounded p-3 bg-light">
                                <img src="{{ asset($post->image) }}" alt="Current image" class="img-thumbnail mx-auto d-block" style="max-width: 300px; max-height: 300px;">
                                <p class="text-center mt-2 mb-0"><small class="text-muted">ภาพปัจจุบัน</small></p>
                            </div>
                        </div>
                        @endif

                        <div class="mb-4">
                            <label for="image" class="form-label fw-bold">อัปโหลดภาพใหม่ <small class="text-muted">(ไม่บังคับ)</small></label>
                            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                            <div class="form-text">เว้นว่างไว้เพื่อใช้ภาพเดิม หรืออัปโหลดภาพใหม่ (JPG, PNG, GIF, WEBP, ฯลฯ) เพื่อแทนที่ - ขนาดสูงสุด: 2MB</div>
                            @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="title" class="form-label fw-bold">ชื่อเรื่อง <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" class="form-control @error('title') is-invalid @enderror" placeholder="ใส่ชื่อเรื่องของโพสต์" required>
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="content" class="form-label fw-bold">เนื้อหา <span class="text-danger">*</span></label>
                            <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" rows="8" placeholder="ใส่เนื้อหาของโพสต์" required>{{ old('content', $post->content) }}</textarea>
                            <div class="form-text">ให้ข้อมูลรายละเอียดเกี่ยวกับโพสต์นี้</div>
                            @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2 justify-content-end">
                            <a href="{{ route('admin.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left me-1"></i> กลับไปยังรายการ
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i> อัปเดตโพสต์
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection