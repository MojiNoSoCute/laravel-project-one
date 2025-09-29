@extends('layout/layout')

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">หน้าหลัก</a></li>
                    <li class="breadcrumb-item active" aria-current="page">คู่มือหลักสูตร</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <h1 class="section-title mb-4">คู่มือหลักสูตรวิศวกรรมซอฟต์แวร์</h1>
            
            <!-- Program Information Card -->
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0">ข้อมูลพื้นฐานของหลักสูตร</h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-borderless">
                                <tr>
                                    <th>ชื่อหลักสูตร (ไทย):</th>
                                    <td>วิศวกรรมซอฟต์แวร์</td>
                                </tr>
                                <tr>
                                    <th>ชื่อหลักสูตร (อังกฤษ):</th>
                                    <td>Software Engineering</td>
                                </tr>
                                <tr>
                                    <th>ชื่อปริญญา (ไทย):</th>
                                    <td>วิศวกรรมศาสตรบัณฑิต</td>
                                </tr>
                                <tr>
                                    <th>ชื่อปริญญา (อังกฤษ):</th>
                                    <td>Bachelor of Engineering</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-borderless">
                                <tr>
                                    <th>จำนวนหน่วยกิตที่ต้องเรียน:</th>
                                    <td>132 หน่วยกิต</td>
                                </tr>
                                <tr>
                                    <th>ภาษาที่ใช้ในการสอน:</th>
                                    <td>ไทย และ อังกฤษ</td>
                                </tr>
                                <tr>
                                    <th>ค่าธรรมเนียมการศึกษาต่อปี:</th>
                                    <td>50,000 บาท</td>
                                </tr>
                                <tr>
                                    <th>หลักสูตรปี:</th>
                                    <td>2025</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection