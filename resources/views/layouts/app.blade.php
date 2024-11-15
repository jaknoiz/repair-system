<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบแจ้งซ่อม</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJ1Q3iqJv7G4b5ge5k9c6B6p3b9yZXr1FWdOxFYggr9hOkJgXvD2y2y5f7n7" crossorigin="anonymous">
    <style>
        /* ตั้งค่า layout ทั่วไป */
        body {
            background-color: #f8f9fa;
            display: flex;
            min-height: 100vh;
            flex-direction: column;
            transition: margin-left 0.3s;
        }

        /* Sidebar */
        .sidebar {
            background-color: #343a40;
            color: white;
            width: 250px;
            height: 100%;
            position: fixed;
            top: 0;
            left: -250px; /* ซ่อน sidebar ตอนเริ่มต้น */
            padding-top: 20px;
            transition: left 0.3s;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 15px;
            font-size: 1.1rem;
        }

        .sidebar a:hover {
            background-color: #007bff;
        }

        /* Main content */
        .main-content {
            margin-left: 0;
            padding: 30px;
            flex-grow: 1;
            transition: margin-left 0.3s;
        }

        footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            width: 100%;
            bottom: 0;
        }

        .content-wrapper {
            min-height: 80vh;
        }

        .sidebar.open {
            left: 0; /* เมื่อเปิด sidebar */
        }

        .main-content.shifted {
            margin-left: 250px; /* ขยับเนื้อหาหลักไปข้างขวาเมื่อ sidebar เปิด */
        }

        /* ปุ่ม toggle สำหรับเปิด/ปิด sidebar */
        .toggle-btn {
            position: absolute;
            top: 20px;
            left: 20px;
            z-index: 1000;
            background-color: transparent;
            border: none;
            color: #343a40;
            font-size: 1.5rem;
        }
    </style>
</head>
<body>

    <!-- ปุ่ม toggle สำหรับเปิด/ปิด Sidebar -->
    <button class="toggle-btn" id="sidebarToggle">
        &#9776; <!-- สัญลักษณ์ Hamburger -->
    </button>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
    <div class="text-center mb-5"> <!-- Increased margin-bottom here -->
        <img src="{{ asset('image/tsu.png') }}" alt="ระบบแจ้งซ่อม Logo" style="width: 200px; height: auto;">
    </div>
    <h2 class="text-center text-white mb-4" style="margin-left: 20px;">ระบบแจ้งซ่อม</h2>
    <a href="{{ route('repair.index') }}">รายการแจ้งซ่อม</a>
    <a href="{{ route('repair.create') }}">กรอกข้อมูลแจ้งซ่อม</a>
</div>

    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        <div class="content-wrapper">
            @yield('content')
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>© 2024 ระบบแจ้งซ่อม</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybGyXr5Kk5L2vptxOF9fWg8w9U9ZmWnpgtjZlSIm6WokRUvZL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-csPR02gjVnK5iN1g0qL5KxI0lcZNdBfT4s7LkjRVn4UAXmZn7hF2bhRYYgWgU8N9" crossorigin="anonymous"></script>

    <script>
    // เมื่อคลิกปุ่ม toggle ให้เปิด/ปิด sidebar
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('mainContent');
    const toggleButton = document.getElementById('sidebarToggle');

    toggleButton.addEventListener('click', function() {
        // ใช้ class เพื่อเปิด/ปิด sidebar
        sidebar.classList.toggle('open');
        mainContent.classList.toggle('shifted');
    });

    // ปิด sidebar เมื่อคลิกนอก sidebar
    document.addEventListener('click', function(event) {
        if (!sidebar.contains(event.target) && !toggleButton.contains(event.target)) {
            sidebar.classList.remove('open');
            mainContent.classList.remove('shifted');
        }
    });

    // ปิด sidebar เมื่อโหลดหน้าใหม่
    window.onload = function() {
        sidebar.classList.remove('open');
        mainContent.classList.remove('shifted');
    };
</script>


</body>
</html>
