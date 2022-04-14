<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>@yield('site-title') &mdash; Kursus Onlineku</title>

	<!-- Custom fonts for this template-->
	<link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/69008e9de8.js" crossorigin="anonymous"></script>
	<!-- Custom styles for this template-->
	<link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
	@yield('custom-style-library')
	<link href="{{ asset('css/custom.css') }}" rel="stylesheet">

</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
				<div class="sidebar-brand-icon">
					<i class="fa-solid fa-chalkboard-user"></i>
				</div>
				<div class="sidebar-brand-text mx-3">Kursus Onlineku</div>
			</a>

			<div class="sidebar-heading">
				Menu
			</div>
			<li class="nav-item @yield('isDashboard')">
				<a class="nav-link" href="{{ route('home') }}">
					<i class="fas fa-fw fa-home"></i>
					<span>Home</span>
				</a>
			</li>
		@if(Auth::user()->user_type == 'admin')
			<li class="nav-item @yield('isMateri')">
				<a class="nav-link" href="{{ route('materi.index') }}">
					<i class="fas fa-solid fa-video"></i>
					<span>Materi Video</span>
				</a>
			</li>
			<li class="nav-item @yield('isMateri')">
				<a class="nav-link" href="{{ route('materi.index') }}">
					<i class="fas fa fa-file-pdf-o"></i>
					<span>Materi PDF</span>
				</a>
			</li>
			<li class="nav-item @yield('isUser')">
				<a class="nav-link" href="{{ route('user.index') }}">
					<i class="fas fa-solid fa-users-line"></i>
					<span>User</span>
				</a>
			</li>
			<li class="nav-item @yield('isFasilitas')">
				<a class="nav-link" href="{{ route('fasilitas.index') }}">
					<i class="fas fa-fw fa-tasks"></i>
					<span>Fasilitas</span>
				</a>
			</li>
		@else

		@endif

			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">

			<!-- Sidebar Toggler (Sidebar) -->
			<div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>

		</ul>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

					<!-- Sidebar Toggle (Topbar) -->
					<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
						<i class="fa fa-bars"></i>
					</button>

					<!-- Topbar Navbar -->
					<ul class="navbar-nav ml-auto">

						<!-- Nav Item - Search Dropdown (Visible Only XS) -->
						<li class="nav-item dropdown no-arrow d-sm-none">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="mr-2 d-inline text-gray-600 small">{{ Auth::user()->nama }}</span>
								<!-- <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60"> -->
								<i class="fas fa-angle-down fa-lg"></i>
							</a>
							<!-- Dropdown - User Information -->
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
								<a class="dropdown-item" href="javascript:void(0)" onclick="$('#logout-form-xs').submit()">
									<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
									Logout
									<form class="d-none" id="logout-form-xs" method="POST" action="{{ route('logout') }}">@csrf</form>
								</a>
							</div>
						</li>

						<li class="nav-item dropdown no-arrow d-none d-sm-block">
							<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->nama }}</span>
								<!-- <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60"> -->
								<i class="fas fa-angle-down fa-lg"></i>
							</a>
							<!-- Dropdown - User Information -->
							<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
								<a class="dropdown-item" href="javascript:void(0)" onclick="$('#logout-form').submit()">
									<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
									Logout
									<form class="d-none" id="logout-form" method="POST" action="{{ route('logout') }}">@csrf</form>
								</a>
							</div>
						</li>

					</ul>

				</nav>
				<!-- End of Topbar -->

				<!-- Begin Page Content -->
				<div class="container-fluid">

					<!-- Page Heading -->
					<h1 class="h3 mb-4 text-gray-800">@yield('page-title')</h1>
					@yield('main-content')

				</div>
				<!-- /.container-fluid -->

			</div>
			<!-- End of Main Content -->

			<!-- Footer -->
			<footer class="sticky-footer bg-white">
				<div class="container my-auto">
					<div class="copyright text-center my-auto">
						<span>Template by <a href="https://startbootstrap.com">StartBootstrap</a></span>
					</div>
				</div>
			</footer>
			<!-- End of Footer -->

		</div>
		<!-- End of Content Wrapper -->

	</div>
	<!-- End of Page Wrapper -->

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

	@yield('modal-content')

	<!-- Bootstrap core JavaScript-->
	<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

	<!-- Core plugin JavaScript-->
	<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

	<!-- Custom scripts for all pages-->
	<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
	@yield('necessary-library')
	<script src="{{ asset('js/custom.js') }}"></script>


</body>

</html>
