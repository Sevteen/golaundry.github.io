<!DOCTYPE html>
<html lang="en" class="h-100">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>GoLaundry - Home</title>
		<!-- Bootstrap -->
		<link
			rel="stylesheet"
			href="<?=base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css"
		/>
		<link
			rel="stylesheet"
			href="<?=base_url()?>assets/landing-page/css/Style.css"
		/>
		<link
			href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap"
			rel="stylesheet"
		/>
		<link
			rel="stylesheet"
			href="<?=base_url()?>assets/vendor/fontawesome/css/all.css"
			type="text/css"
		/>
		<!-- jQuery -->
		<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css"
			integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
			crossorigin="anonymous"
			referrerpolicy="no-referrer"
		/>
		<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"
			integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
			crossorigin="anonymous"
			referrerpolicy="no-referrer"
		/>
		<link
			rel="stylesheet"
			href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css"
		/>
		<link rel="stylesheet" href="<?=base_url()?>assets/vendor/sweetalert/sweetalert2.min.css">
	</head>

	<body class="d-flex flex-column h-100">
    	<?php $hal = $this->uri->segment(1); ?>


		<!-- Navbar -->
		<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow">
			<div class="container-fluid">
				<a class="navbar-brand" href="<?=base_url()?>">GoLaundry</a>
				<button
					class="navbar-toggler"
					type="button"
					data-bs-toggle="collapse"
					data-bs-target="#navbarNav"
					aria-controls="navbarNav"
					aria-expanded="false"
					aria-label="Toggle navigation"
				>
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link <?=($hal=='')?'active':'';?>" href="<?=base_url()?>">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?=($hal=='status')?'active':'';?>" href="<?=base_url('status')?>">Cek Status</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?=($hal=='tarif')?'active':'';?>" href="<?=base_url('tarif')?>">Daftar Harga</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?=($hal=='ketentuan')?'active':'';?>" href="<?=base_url('ketentuan')?>">Ketentuan</a>
						</li>
					</ul>
					<?php if($this->session->userdata('isLoggedin')):?>
						<div class="navbar-nav ms-auto">
							<a class="nav-link" href="<?php if($this->session->userdata('jenis')=='Admin'){echo base_url('index.php/admin/home')?><?php } else {echo base_url('index.php/member/home')?><?php }?>">
								<div class="person_box">
									<i class="fas fa-tachometer-alt"></i>
									<div class="person_auth" style="display: inline-block">
										<span>Dashboard</span>
									</div>
								</div>
							</a>
						</div>
					<?php else:?>
						<div class="navbar-nav ms-auto">
							<div
								class="person_box"
								data-bs-toggle="modal"
								data-bs-target="#AuthorizationForm"
							>
								<i class="far fa-user"></i>
								<div class="person_auth" style="display: inline-block">
									<span>Masuk/Daftar</span>
								</div>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</nav>
		<!-- End Navbar -->

    <?php 
		if(!defined('BASEPATH')) exit ('No direct script access allowed');
		if($content){$this->load->view($content);}
    ?>

		<!-- Modal Login & Register -->
		<div
			class="modal fade"
			id="AuthorizationForm"
			tabindex="-1"
			aria-labelledby="exampleModalLabel"
			aria-hidden="true"
		>
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">GoLaundry</h5>
						<p>
							Mendaftar ke situs web ini, Anda sudah membaca, mengerti dan
							menyetujui 【Syarat dan Ketentuan】 dan 【Privacy Policy】
						</p>
					</div>
					<div class="modal-body">
						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<li class="nav-item" role="presentation">
								<button
									class="nav-link active"
									id="masuk-tab"
									data-bs-toggle="tab"
									data-bs-target="#masuk"
									type="button"
									role="tab"
									aria-controls="masuk"
									aria-selected="true"
								>
									Masuk
								</button>
							</li>
							<li class="nav-item" role="presentation">
								<button
									class="nav-link"
									id="daftar-tab"
									data-bs-toggle="tab"
									data-bs-target="#daftar"
									type="button"
									role="tab"
									aria-controls="daftar"
									aria-selected="false"
								>
									Daftar
								</button>
							</li>
						</ul>
						<div class="tab-content py-3" id="myTabContent">
							<div
								class="tab-pane fade show active"
								id="masuk"
								role="tabpanel"
								aria-labelledby="masuk-tab"
							>
								<form>
									<div class="input-group">
										<div
											class="
												input-group-text
												justify-content-center
												col-1
												bg-transparent
												border-end-0
											"
										>
											<span class="fa fa-user"></span>
										</div>
										<input
											type="text"
											class="form-control border-start-0 border-start-0"
											placeholder="Username"
											id="username"
										/>
									</div>
									<div class="input-group">
										<div
											class="
												input-group-text
												justify-content-center
												col-1
												bg-transparent
												border-end-0
											"
										>
											<span class="fa fa-lock"></span>
										</div>
										<input
											type="password"
											class="form-control border-start-0"
											placeholder="Password"
											id="password"
										/>
									</div>
									<div class="mb-3 mx-2 form-check">
										<input
											type="checkbox"
											class="form-check-input"
											id="rememberme"
										/>
										<label class="form-check-label" for="rememberme"
											>Remember me</label
										>
									</div>
									<div class="d-grid mx-auto">
										<button
											type="button"
											class="btn btn-primary mt-3 rounded-pill btn-login"
										>
											Login
										</button>
									</div>
								</form>
							</div>
							<div
								class="tab-pane fade"
								id="daftar"
								role="tabpanel"
								aria-labelledby="daftar-tab"
							>
								<form>
									<div class="input-group">
										<div
											class="
												input-group-text
												justify-content-center
												col-1
												bg-transparent
												border-end-0
											"
										>
											<span class="fa fa-user"></span>
										</div>
										<input
											type="text"
											class="form-control border-start-0"
											id="nama"
											placeholder="Nama Lengkap"
										/>
									</div>
									<div class="input-group">
										<div
											class="
												input-group-text
												justify-content-center
												col-1
												bg-transparent
												border-end-0
											"
										>
											<span class="fa fa-phone"></span>
										</div>
										<input
											type="text"
											class="form-control border-start-0"
											id="no_hp"
											placeholder="Kontak"
										/>
									</div>
									<div class="input-group">
										<div
											class="
												input-group-text
												justify-content-center
												col-1
												bg-transparent
												border-end-0
											"
										>
											<span class="fa fa-phone"></span>
										</div>
										<input
											type="text"
											class="form-control border-start-0"
											id="email"
											placeholder="Email"
										/>
									</div>
									<div class="input-group">
										<div
											class="
												input-group-text
												justify-content-center
												col-1
												bg-transparent
												border-end-0
											"
										>
											<span class="fa fa-transgender"></span>
										</div>
										<select id="jk" class="form-control border-start-0">
											<option value="Pria">Pria</option>
											<option value="Wanita">Wanita</option>
										</select>
									</div>
									<div class="input-group">
										<div
											class="
												input-group-text
												justify-content-center
												col-1
												bg-transparent
												border-end-0
											"
										>
											<span class="fa fa-home"></span>
										</div>
										<textarea
											rows="3"
											size="30"
											type="text"
											class="form-control border-start-0"
											id="alamat"
											placeholder="Alamat Lengkap"
										></textarea>
									</div>
									<div class="input-group">
										<div
											class="
												input-group-text
												justify-content-center
												col-1
												bg-transparent
												border-end-0
											"
										>
											<span class="fa fa-user"></span>
										</div>
										<input
											type="text"
											class="form-control border-start-0"
											id="username-signup"
											placeholder="Username"
										/>
									</div>
									<div class="input-group">
										<div
											class="
												input-group-text
												justify-content-center
												col-1
												bg-transparent
												border-end-0
											"
										>
											<span class="fa fa-lock"></span>
										</div>
										<input
											type="password"
											class="form-control border-start-0"
											id="password-signup"
											placeholder="Password"
										/>
									</div>
									<div class="d-grid mx-auto">
										<button
											type="button"
											class="btn btn-primary mt-3 rounded-pill btn-signup"
										>
											Registrasi
										</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<footer class="gradient mt-auto">
			<div class="container-fluid text-center text-white p-3">
				<span>Made with <i class="bi bi-heart-fill"></i> by Ilham Hanif</span>
			</div>
		</footer>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script
			src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"
			integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A=="
			crossorigin="anonymous"
			referrerpolicy="no-referrer"
		></script>
		<script
			type="text/javascript"
			src="<?=base_url()?>assets/landing-page/js/script.js"
		></script>
		<script src="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?=base_url()?>assets/vendor/sweetalert/sweetalert2.min.js"></script>
		<script type="text/javascript">
			$("#username").keyup(function(event) {
				if (event.keyCode === 13) {
					$(".btn-login").click();
				}
			});

			$("#password").keyup(function(event) {
				if (event.keyCode === 13) {
					$(".btn-login").click();
				}
			});

			$(".btn-login").on("click", function () {
				var username = $("#username").val();
				var password = $("#password").val();

				if (username.length > 0 && password.length > 0) {
					$.ajax({
						url: "<?= base_url('index.php/authorization/login') ?>",
						type: "POST",
						data: {
						username: username,
						password: password,
						},
						success:function(result) {
							var hasil = JSON.parse(result);
							Swal.fire({
								title: hasil.title,
								text: hasil.message,
								icon: hasil.type,
							});
							if(hasil['status_code'] == 200)
								setTimeout(() => {
									window.location.href = '<?= base_url('authorization/')?>'
								}, 1500);
						}
					});
				}
			});

			$(".btn-signup").on("click", function () {
				var name = $("#nama").val();
				var contact = $("#no_hp").val();
				var email = $("#email").val();
				var gender = $("#jk").val();
				var address = $("#alamat").val();
				var username = $("#username-signup").val();
				var password = $("#password-signup").val();
				
				if(name.length > 0 && contact.length > 0 && gender.length > 0 && address.length > 0 && username.length > 0 && password.length > 0){
					$.ajax({
						url: "<?= base_url('index.php/authorization/signup')?>",
						type: "POST",
						data: {
							nama: name,
							no_hp: contact,
							email: email,
							jk: gender,
							alamat: address,
							username: username,
							password: password
						},
						success:function(result){
							var hasil = JSON.parse(result);
							let timerInterval

							if(hasil.status_code == 409){
								Swal.fire({
									title: hasil.title,
									text: hasil.message,
									icon: hasil.type,
								});
							}else if(hasil.status_code == 200){
								Swal.fire({
									title: hasil.title,
									text: hasil.message,
									html: 'Go to the main page in <strong></strong> seconds.<br/><br/>',
									timer: 10000,
									icon: hasil.type,
									didOpen: () => {
										const content = Swal.getHtmlContainer()
										const $ = content.querySelector.bind(content)
									
										Swal.showLoading()
									
										timerInterval = setInterval(() => {
										Swal.getHtmlContainer().querySelector('strong')
											.textContent = (Swal.getTimerLeft() / 1000)
											.toFixed(0)
										}, 100)
									},
									willClose: () => {
										clearInterval(timerInterval)
									}
								});
								setTimeout(() => {
									window.location.href = '<?= base_url('')?>'
								}, 10000);
							}
						}
					});
				}
			});
		</script>
	</body>
</html>