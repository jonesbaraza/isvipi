<?php 
    $pages->protected(false);
    $pages->load_theme_file(array('file'=>'head', 'folder' => 'global'));
?>
<body>
	<img class="site-bg" src="build/media/default/bg.jpg" alt="">
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">
						<center>
							<img src="<?php echo $pages->load_page_media("logo") ?>" class="brand-logo" alt="logo">
						</center>
						<div class="text-center mt-4">
							<h1 class="h1">Get Started</h1>
							<p class="lead">
								Join this growing community of friends and networks.
							</p>
						</div>
						
						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<form>
										<div class="row">
											<div class="mb-3 col-md-6">
												<label class="form-label">First Name</label>
												<input class="form-control form-control-lg" type="text" name="fname" placeholder="First name" />
											</div>
											<div class="mb-3 col-md-6">
												<label class="form-label">Last Name</label>
												<input class="form-control form-control-lg" type="text" name="lname" placeholder="Last Name" />
											</div>
										</div>
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input class="form-control form-control-lg" type="email" name="email" placeholder="Email" />
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" type="password" name="pwd" placeholder="Password" />
										</div>
										<div class="row">
											<label class="form-label">Date of Birth</label>
											<div class="mb-3 col-md-4">
												<input class="form-control form-control-lg" type="number" name="dd" placeholder="DD" />
											</div>
											<div class="mb-3 col-md-4">
												<input class="form-control form-control-lg" type="number" name="mm" placeholder="MM" />
											</div>
											<div class="mb-3 col-md-4">
												<input class="form-control form-control-lg" type="number" name="yyyy" placeholder="YYYY" />
											</div>
										</div>
										<div class="mb-3">
											<label class="form-label">Gender</label>
											<select name="gender" class="form-control">
												<?php foreach($genders as $key => $gend){?>
													<option value="<?php echo $gend['id'] ?>"><?php echo ucfirst($gend['gender']) ?></option>
												<?php } ?>
											</select>
										</div>
										<div class="text-center mt-3">
											<button type="submit" class="btn btn-lg btn-primary">Sign up</button>
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>
<?php $pages->load_theme_file(array('file'=>'footer', 'folder' => 'global'));?>