<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset("template/img") }}/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <!-- Libraries Stylesheet -->
    <link href="{{ asset("template/lib") }}/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="{{ asset("template/lib") }}/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset("template") }}/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset("template") }}/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.1/css/dataTables.dataTables.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>

<body>

    @if (session("sukses"))
<script>
    Swal.fire({
title: "{{ session('sukses') }}",
icon: "success",
draggable: true
});
</script>
@endif
@if (session("error"))
    <script>
        Swal.fire({
  icon: "error",
  title: "gagal membuat transaksi",
  text: "{{ session('error') }}",
});
    </script>
@endif
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->

        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        @yield('login')

        @auth
        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <x-sidebar></x-sidebar>
        </div>
        <!-- Sidebar End -->
        <!-- Content Start -->
        <div class="content">

            <!-- Navbar Start -->
            <x-navbar></x-navbar>

            <!-- Navbar End -->
            @yield('content')

            <!-- Widgets End -->



`

<!-- Footer Start -->
<x-footer></x-footer>
        <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    @endauth

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset("template/lib") }}/chart/chart.min.js"></script>
    <script src="{{ asset("template/lib") }}/easing/easing.min.js"></script>
    <script src="{{ asset("template/lib") }}/waypoints/waypoints.min.js"></script>
    <script src="{{ asset("template/lib") }}/owlcarousel/owl.carousel.min.js"></script>
    <script src="{{ asset("template/lib") }}/tempusdominus/js/moment.min.js"></script>
    <script src="{{ asset("template/lib") }}/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="{{ asset("template/lib") }}/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Template Javascript -->
    <script src="{{ asset("template") }}/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/2.3.1/js/dataTables.min.js"></script>
    <script>
        let table = new DataTable('#myTable');
    </script>
</body>

</html>
