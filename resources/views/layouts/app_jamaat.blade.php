<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- favico -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/app_admin/dashboard/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/app_admin/dashboard/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/app_admin/dashboard/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('images/app_admin/dashboard/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('images/app_admin/dashboard/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
	<link rel="stylesheet" href="{{ asset('css/app_jamaat/style.css') }}">
    @yield('css')

	<script src="https://code.jquery.com/jquery-3.5.1.js" >
    </script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/r-2.3.0/datatables.min.css"/>
 
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-html5-2.2.3/b-print-2.2.3/r-2.3.0/datatables.min.js"></script>

    <title>Vihara Dhammajaya</title>

</head>
<body>
	<div id="app">
		<div class="container-fluid py-3" style="background-color: black">
			<div class="container">
				<div class="row">
					<div class="col-4 mt-1">
						<form class="d-flex" role="search" >
							<a href="#" style="padding-right: 15px ;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-search"
								viewBox="0 0 16 16">
								<path
								d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
							</svg></a>
							<input class="form-control me-2" type="search" placeholder="Cari" aria-label="search" style="padding-left:20px;">
						</form>
					</div>
					<div class="col-4">
						<img src="{{ asset('images/app_jamaat/logovihara.jpg') }}" alt="" class="img-fluid">
					</div>
					<div class="col-4 mt-1 text-end">
						<div class="dropdown">
							@guest('user')
								@if (Auth::guard('admin')->check())
									<a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"
										style="color:white;text-decoration:none;padding-left:10px;">
										{{ Auth::guard('admin')->user()->name }}
									</a>
									<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
										<a class="dropdown-item" href="{{ url('admin-dashboard') }}">
											{{ __('Admin Dashboard') }}
										</a>
										<a class="dropdown-item" href="{{ route('logout') }}"
										onclick="event.preventDefault();
														document.getElementById('logout-form').submit();">
											{{ __('Logout') }}
										</a>
										<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
											@csrf
										</form>
									</ul>
								@else
                                    <a><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white"
                                        class="bi bi-person-circle" viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                        <path fill-rule="evenodd"
                                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" /></svg>
                                    </a>

									{{-- Login langsung redirect ke login Umat --}}
									<a href="{{ url('login-jamaat') }}" role="button" id="dropdownMenuLink" aria-expanded="false"
										style="color:white;text-decoration:none;padding-left:10px;">
										Masuk
									</a>

									{{-- Menampilkan dropdown Admin/Umat --}}
									{{-- <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"
										style="color:white;text-decoration:none;padding-left:10px;">
										Masuk
									</a>
									<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
										<li><a class="dropdown-item" href="
											@if (Auth::guard('admin')->check())
												{{ url('post-login') }}
											@else
												{{ url('login-admin') }}
											@endif
											">Admin</a>
										</li>
										<li><a class="dropdown-item" href="
											@if (Auth::guard('user')->check())
												{{ url('post-login') }}
											@else
												{{ url('login-jamaat') }}
											@endif
											">Umat</a>
										</li>
									</ul> --}}
								@endif
							@else
								<a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"
									style="color:white;text-decoration:none;padding-left:10px;">
									{{ Auth::guard('user')->user()->name }}
								</a>
								<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
									<a class="dropdown-item" href="{{ url('update-profile/'.Auth::guard('user')->user()->id_code) }}">
										{{ __('Edit Profil') }}
									</a>
									<a class="dropdown-item" href="{{ url('ganti-password/'.Auth::guard('user')->user()->id_code) }}">
										{{ __('Ganti Password') }}
									</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </ul>
							@endguest
						</div>
					</div>
				</div>
			</div>
		</div>
		<nav class="navbar navbar-expand-sm bg-black navbar-dark">
			<div class="container-fluid">
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar">
					<ul class="navbar-nav">
						{{-- Link href active (bisa diakses) --}}
						<li class="nav-item">
							<a class="nav-link" href="{{ url('/') }}">Beranda</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ url('info-terkini') }}">Berita</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ url('info-kegiatan') }}">Info Kegiatan</a>
						</li>
						{{-- <li class="nav-item">
							<a class="nav-link" href="{{ url('info-donasi') }}">Donasi</a>
						</li> --}}
						
						{{-- freeze --}}
						{{-- <li class="nav-item">
							<a class="nav-link" href="#">Beranda</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Berita</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Info Kegiatan</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Donasi</a>
						</li> --}}
					</ul>
				</div>
			</div>
		</nav>

		<main class="py-4">
			@yield('coming-soon')
            @yield('content')
        </main>

		<div class="container-fluid" style="background-color: black;">
			<div class="row">
				<div class="col-lg-3 col-md-10 offset-lg-1 mt-5 offset-md-1 col-sm- offset-sm-1">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d536.5756205839982!2d112.676517475972!3d-7.280855255110461!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fc332bb947e7%3A0x3b0ead7cf875a759!2sVihara%20Dhamma%20Jaya!5e1!3m2!1sen!2sid!4v1658591199308!5m2!1sen!2sid" width="100%" height="450" style="border:0;max-width:600px" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					<div class="mt-5">
						<a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#E57616"
							class="bi bi-geo-alt" viewBox="0 0 16 16">
							<path
							d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
							<path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
						</svg></a>
						<a href="#" style="color:white ;text-decoration:none;padding-left:10px;">Jalan Bulu Jaya V/19 Surabaya</a>
					</div>
					<div class="mt-3">
						<a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#E57616"
							class="bi bi-telephone" viewBox="0 0 16 16">
							<path
							d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
						</svg></a>
						<a href="#" style="color:white ;text-decoration:none;padding-left:10px;">031-7349600</a>
					</div>
					<div class="mt-3">
						<a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#E57616"
							class="bi bi-envelope" viewBox="0 0 16 16">
							<path
							d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
						</svg></a>
						<a href="#" style="color:white ;text-decoration:none;padding-left:10px;">vihara.dhammajaya@yahoo.co.id</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-10 offset-md-1 mt-5 col-sm-10 offset-sm-1" style="color:white ;">
					<div>
						<h2>Vihara Dhammajaya</h2>
					</div>
					<div>
						<p>Vihara berarti rumah ibadah agama Buddha, atau bisa di sebut dengan kuil yang memiliki fungsi spiritual. Di
						Surabaya ada beberapa vihara, salah satunya Vihara Dhamma Jaya yang berada di jalan Bulu Jaya.
				
						Mengingat perkembangan agama Buddha semakin meningkat dan kebutuhan akan vihara / cetiya sangat diperlukan,
						pada tahun 1992 diperoleh tempat dengan cara menyewa di Jalan Tulung Agung IV No. 6 Surabaya. Tepat pada
						tanggal 22 Maret 1992 dibentuk dan diresmikan sebuah cetiya yang bernama Vihara “Dhamma Jaya”. Peresmian
						Cetiya Dhamma Jaya ini dihadiri oleh lima orang Bhikkhu yakni: Bhikkhu Khemasarano, Bhikkhu Dhammavijayo,
						Bhikkhu Dhammasubho, Bhikkhu Uttamo, Bhikkhu Jayasiriko dan Samanera Slamet.</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-10 offset-md-1 mt-5 col-sm-10 offset-sm-1" style="color:white ;">
					<p class="footer-company-about">
						<span>Selengkapnya</span>
					<p><a href="#" style="color:#E57616;text-decoration:none;">Kebijakan Privasi</a></p>
					<p><a href="#" style="color:#E57616;text-decoration:none;">Syarat dan Ketentuan</a></p>
					<p><a href="#" style="color:#E57616;text-decoration:none;">Kebijakan Refund</a></p>
					<p><a href="#" style="color:#E57616;text-decoration:none;">Daftar Rekening</a></p>
					</p>
					<div class="footer-icons" style="margin-top:30px ;">
						<a href="https://id-id.facebook.com/vihara.dhammajaya/"><svg xmlns="http://www.w3.org/2000/svg" width="25px" height="25px" fill="white"
							class="bi bi-facebook" viewBox="0 0 16 16">
							<path
							d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
						</svg></a>
						<a href="https://www.instagram.com/dhammajayasub/?hl=id" style="padding-left: 20px ;"><svg xmlns="http://www.w3.org/2000/svg" width="25px" height="25px"
							fill="white" class="bi bi-instagram" viewBox="0 0 16 16">
							<path
							d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
						</svg></i></a>
						<a href="#" style="padding-left: 20px ;"><svg xmlns="http://www.w3.org/2000/svg" width="25px" height="25px"
							fill="white" class="bi bi-whatsapp" viewBox="0 0 16 16">
							<path
							d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
						</svg></a>
						<a href="#" style="padding-left: 20px ;"><svg xmlns="http://www.w3.org/2000/svg" width="25px" height="25px"
							fill="white" class="bi bi-line" viewBox="0 0 16 16">
							<path
							d="M8 0c4.411 0 8 2.912 8 6.492 0 1.433-.555 2.723-1.715 3.994-1.678 1.932-5.431 4.285-6.285 4.645-.83.35-.734-.197-.696-.413l.003-.018.114-.685c.027-.204.055-.521-.026-.723-.09-.223-.444-.339-.704-.395C2.846 12.39 0 9.701 0 6.492 0 2.912 3.59 0 8 0ZM5.022 7.686H3.497V4.918a.156.156 0 0 0-.155-.156H2.78a.156.156 0 0 0-.156.156v3.486c0 .041.017.08.044.107v.001l.002.002.002.002a.154.154 0 0 0 .108.043h2.242c.086 0 .155-.07.155-.156v-.56a.156.156 0 0 0-.155-.157Zm.791-2.924a.156.156 0 0 0-.156.156v3.486c0 .086.07.155.156.155h.562c.086 0 .155-.07.155-.155V4.918a.156.156 0 0 0-.155-.156h-.562Zm3.863 0a.156.156 0 0 0-.156.156v2.07L7.923 4.832a.17.17 0 0 0-.013-.015v-.001a.139.139 0 0 0-.01-.01l-.003-.003a.092.092 0 0 0-.011-.009h-.001L7.88 4.79l-.003-.002a.029.029 0 0 0-.005-.003l-.008-.005h-.002l-.003-.002-.01-.004-.004-.002a.093.093 0 0 0-.01-.003h-.002l-.003-.001-.009-.002h-.006l-.003-.001h-.004l-.002-.001h-.574a.156.156 0 0 0-.156.155v3.486c0 .086.07.155.156.155h.56c.087 0 .157-.07.157-.155v-2.07l1.6 2.16a.154.154 0 0 0 .039.038l.001.001.01.006.004.002a.066.066 0 0 0 .008.004l.007.003.005.002a.168.168 0 0 0 .01.003h.003a.155.155 0 0 0 .04.006h.56c.087 0 .157-.07.157-.155V4.918a.156.156 0 0 0-.156-.156h-.561Zm3.815.717v-.56a.156.156 0 0 0-.155-.157h-2.242a.155.155 0 0 0-.108.044h-.001l-.001.002-.002.003a.155.155 0 0 0-.044.107v3.486c0 .041.017.08.044.107l.002.003.002.002a.155.155 0 0 0 .108.043h2.242c.086 0 .155-.07.155-.156v-.56a.156.156 0 0 0-.155-.157H11.81v-.589h1.525c.086 0 .155-.07.155-.156v-.56a.156.156 0 0 0-.155-.157H11.81v-.589h1.525c.086 0 .155-.07.155-.156Z" />
						</svg></a>
					</div>
				</div>
			</div>
		</div>
		
        <div class="container-fluid py-1" style="background-color:black ;">
            <div class="col-12 text-end mb-5">
                <p class="footer-company-name" style="color:white; margin-right:50px ;">© Copyright Vihara Dhammajaya</p>
            </div>
        </div>
	</div>

    {{-- <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ url('/') }}">
              {{ config('app.name', 'Laravel') }}
              {{ 'Vihara Dhammajaya' }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Masuk
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						
						<a class="dropdown-item" href="
						@if (Auth::guard('admin')->check())
							{{ url('post-login') }}
						@else
							{{ url('login-admin') }}
						@endif
						">Admin
						</a>

						<a class="dropdown-item" href="{{ url('login-jamaat') }}">Jamaat</a>
					</div>
                </li>
              </ul>
            </div>
          </nav>

          <main class="py-4">
            @yield('content')
          </main>
    </div> --}}

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
	@yield('script')
</body>
</html>