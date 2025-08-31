<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
        
    <style>
        .bg-red {
            background-color: #e60000;
        }
        .text-light-red {
            color: #ff9999;
        }
        .text-white {
            color: #fff;
        }
        .main-hero {
            padding: 5rem 1rem;
        }
        .section-title {
            font-weight: 700;
            border-bottom: 2px solid #e60000;
            padding-bottom: 0.5rem;
            margin-bottom: 1.5rem;
        }
        .card-custom {
            background-color: #f2f2f2;
        }
        .teacher-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-color: #ccc;
        }
        .footer {
            background-color: #333;
            color: #fff;
        }
        .navbar {
            padding: 0px 280px 0px 280px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a href="{{ route('index') }}" class="navbar-brand">ระบบประชาสัมพันธ์หลักสูตรวิศวกรรมซอฟต์แวร์</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="{{ route('index') }}" class="nav-link {{ request()->is(patterns: '/') ? 'active' : '' }}">หน้าหลัก</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a href="{{ route('create') }}" class="nav-link">Create Post</a>
                    </li> --}}
                </ul>
            </div>
        </div>
    </nav>

    <section class="main-hero bg-red text-white">
        <div class="container">
            <h1>วิศวกรรมซอฟต์แวร์</h1>
            <h2>Software Engineering</h2>
            <p>หลักสูตรวิศวกรรมศาสตรบัณฑิต สาขาวิชาวิศวกรรมซอฟต์แวร์</p>
            <a href="#" class="btn btn-outline-light rounded-pill mt-3">คู่มือหลักสูตร</a>
        </div>
    </section>

    <div class="container my-5">
        @yield('content')
    </div>

    <footer class="footer py-5">
        <div class="container ">
            <div class="row">
                <div class="col-md-6 mb-4 mb-md-0">
                    <h3 class="text-light-red">ระบบประเมินผลสัมฤทธิ์หลักสูตรวิศวกรรมซอฟต์แวร์</h3>
                    <p>ข้อมูลหลักสูตร ข่าวสาร และกิจกรรมที่เกี่ยวข้องกับหลักสูตรวิศวกรรมซอฟต์แวร์</p>
                </div>
                <div class="col-md-6">
                    <h3 class="text-light-red">ติดต่อเรา</h3>
                    <p>ภาควิชาวิศวกรรมซอฟต์แวร์<br>โทรศัพท์ 02-xxx-xxxx<br>อีเมล npru@webmail.npru.ac.th</p>
                </div>
            </div>
        </div>
    </footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>