
		<div class="container">
			<!-- Outer Row -->
			<div class="row justify-content-center">
				<div class="col-lg-7">
					<div class="card o-hidden border-0 shadow-lg my-5">
						<div class="card-body p-0">
							<!-- Nested Row within Card Body -->
							<div class="row">
								
								<div class="col-lg">
									<div class="p-5">
										<div class="text-center">
											<h1 class="h4 text-gray-900 mb-4">Silahkan Login</h1>
										</div>

										<?= $this->session->flashdata('pesan'); ?>

										<form class="user" method="post" action="<?= base_url('admin/login'); ?>">
											<div class="form-group">
												<input
													type="text"
													class="form-control form-control-user"
													id="email" name='email'
													placeholder="Enter Email Address..." value="<?= set_value('email'); ?>"/>
													<?= form_error('email','<small class="text-danger pl-3">','</small>'); ?>
											</div>
											<div class="form-group">
												<input
													type="password"
													class="form-control form-control-user"
													id="password" name="password"
													placeholder="Password"
												/>
												<?= form_error('password','<small class="text-danger pl-3">','</small>'); ?>
											</div>
											
											<button
												type="submit"
												class="btn btn-primary btn-user btn-block">
												Login
											</button>
											<hr />

										<div class="text-center">
											<a class="small" href="forgot-password.html"
												>Lupa Password?</a>
										</div>
										<div class="text-center">
											<a class="small" href="<?= base_url('admin/registrasi')?>"
												>Buat Akun Baru!</a>
                        <p class="mb-1">
                    <p class="small">
                    <a href="<?= base_url('beranda') ?>">Kembali ke Beranda</a>
                  </p>
				  <p class="mt-3 mb-1 text-muted">&copy; 2022 - Yoga Anditia</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    