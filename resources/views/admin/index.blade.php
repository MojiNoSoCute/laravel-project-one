@extends('layout.admin')

@section('page-title', 'จัดการโพสต์')

@section('admin-content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>จัดการโพสต์</h1>
        <a href="{{ route('admin.create') }}" class="btn btn-primary">+ สร้างโพสต์ใหม่</a>
    </div>

    @if($posts->count())
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ภาพ</th>
                            <th>ชื่อเรื่อง</th>
                            <th>หมวดหมู่</th>
                            <th>วันที่สร้าง</th>
                            <th>การจัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td>
                                @if($post->image)
                                <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="img-fluid" style="width: 80px; height: 60px; object-fit: cover;">
                                @else
                                ไม่มีภาพ
                                @endif
                            </td>
                            <td>{{ $post->title }}</td>
                            <td>
                                @if($post->main === '1')
                                ภาพรวมหลักสูตร
                                @elseif($post->main === '2')
                                กิจกรรมที่น่าสนใจ
                                @elseif($post->main === '3')
                                อาจารย์ผู้สอน
                                @elseif($post->main === '4')
                                ผลงานนักศึกษา
                                @elseif($post->main === '5')
                                ศิษย์เก่าเด่น
                                @endif
                            </td>
                            <td>{{ $post->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <a href="{{ route('admin.show', $post) }}" class="btn btn-sm btn-info">ดู</a>
                                <a href="{{ route('admin.edit', $post) }}" class="btn btn-sm btn-warning">แก้ไข</a>
                                <form action="{{ route('admin.destroy', $post) }}" method="POST" style="display:inline" onsubmit="return confirm('คุณแน่ใจหรือไม่ที่จะลบโพสต์นี้?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">ลบ</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @else
    <div class="alert alert-info">ยังไม่มีโพสต์ในระบบ</div>
    @endif
</div>
@endsection