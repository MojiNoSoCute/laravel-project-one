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

        .navbar {
            padding: 0.5rem 1rem;
        }

        @media (min-width: 1200px) {
            .navbar {
                padding: 0.5rem 280px;
            }
        }

        /* Sticky footer implementation */
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        .main-content {
            flex: 1 0 auto;
        }

        .footer {
            flex-shrink: 0;
            background-color: #333;
            color: #fff;
            margin-top: auto;
        }

        /* Custom column class for 5 items per row */
        .col-lg-2-4 {
            flex: 0 0 auto;
            width: 20%;
        }

        @media (max-width: 991.98px) {
            .col-lg-2-4 {
                width: 50%;
            }
        }

        @media (max-width: 575.98px) {
            .col-lg-2-4 {
                width: 100%;
            }
        }

        /* Image upload and display styles */
        .post-image {
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Additional footer improvements */
        .footer .contact-info i {
            color: #ff9999;
            width: 20px;
        }

        .footer a:hover {
            color: #ffffff !important;
            text-decoration: underline;
        }

        .footer hr {
            opacity: 0.3;
        }

        /* Responsive improvements */
        @media (max-width: 768px) {
            .navbar-brand {
                font-size: 0.9rem;
            }

            .main-hero {
                padding: 3rem 1rem;
            }

            .main-hero h1 {
                font-size: 1.8rem;
            }

            .main-hero h2 {
                font-size: 1.3rem;
            }

            .footer {
                text-align: center;
            }

            .footer .contact-info {
                margin-top: 2rem;
            }
        }

        @media (max-width: 576px) {
            .footer h3 {
                font-size: 1.1rem;
            }

            .footer p {
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<body>
    <div class="main-content">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a href="{{ route('home') }}" class="navbar-brand">ระบบประชาสัมพันธ์หลักสูตรวิศวกรรมซอฟต์แวร์</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">หน้าหลัก</a>
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

        <main class="container my-5">
            @yield('content')
        </main>
    </div>

    <footer class="footer py-5 mt-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
                    <h3 class="text-light-red mb-3">ระบบประเมินผลสัมฤทธิ์หลักสูตรวิศวกรรมซอฟต์แวร์</h3>
                    <p class="mb-3">ข้อมูลหลักสูตร ข่าวสาร และกิจกรรมที่เกี่ยวข้องกับหลักสูตรวิศวกรรมซอฟต์แวร์</p>
                    <div class="d-flex flex-column flex-sm-row gap-3">
                        <small class="text-white">&copy; 2025 มหาวิทยาลัยราชภัฏนครปฐม</small>
                    </div>
                    <a href="{{ route('admin.index') }}">admin page</a>
                </div>
                <div class="col-lg-6 col-md-6">
                    <h3 class="text-light-red mb-3">ติดต่อเรา</h3>
                    <div class="contact-info">
                        <p class="mb-2">
                            <i class="fas fa-building me-2"></i>
                            <strong>ภาควิชาวิศวกรรมซอฟต์แวร์</strong>
                        </p>
                        <p class="mb-2">
                            <i class="fas fa-phone me-2"></i>
                            โทรศัพท์ 02-xxx-xxxx
                        </p>
                        <p class="mb-2">
                            <i class="fas fa-envelope me-2"></i>
                            <a href="mailto:npru@webmail.npru.ac.th" class="text-light text-decoration-none">npru@webmail.npru.ac.th</a>
                        </p>
                        <p class="mb-0">
                            <i class="fas fa-map-marker-alt me-2"></i>
                            มหาวิทยาลัยราชภัฏนครปฐม
                        </p>
                    </div>
                </div>
            </div>
            <hr class="my-4 bg-light">
            <div class="row">
                <div class="col-12 text-center">
                    <small class="text-white">พัฒนาโดย หลักสูตรวิศวกรรมซอฟต์แวร์ | คณะเทคโนโลยีสารสนเทศ</small>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Image preview functionality
        document.addEventListener('DOMContentLoaded', function() {
            const imageInput = document.getElementById('image');
            if (imageInput) {
                imageInput.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    if (file) {
                        // Check file size (2MB = 2 * 1024 * 1024 bytes)
                        if (file.size > 2 * 1024 * 1024) {
                            alert('File size must be less than 2MB');
                            this.value = '';
                            return;
                        }

                        // Show preview if it's an image
                        if (file.type.startsWith('image/')) {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                // Remove existing preview
                                const existingPreview = document.getElementById('image-preview');
                                if (existingPreview) {
                                    existingPreview.remove();
                                }

                                // Create new preview
                                const preview = document.createElement('div');
                                preview.id = 'image-preview';
                                preview.className = 'mt-2';
                                preview.innerHTML = `
                                    <div class="border rounded p-2 bg-light">
                                        <img src="${e.target.result}" alt="Preview" class="img-thumbnail mx-auto d-block" style="max-width: 200px; max-height: 200px;">
                                        <p class="text-center mt-1 mb-0"><small class="text-muted">Image preview</small></p>
                                    </div>
                                `;
                                imageInput.parentNode.appendChild(preview);
                            };
                            reader.readAsDataURL(file);
                        }
                    }
                });
            }
        });
    </script>
</body>

</html>