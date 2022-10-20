<!DOCTYPE html>
<html lang="<?php echo LANG ?>">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="<?php echo $meta['description'] ?>">
	<meta name="robots" content="<?php echo $meta['robots'] ?>">
	<meta name="keywords" content="<?php echo $meta['keywords'] ?>">
    <meta http-equiv="expires" content="<?php echo $meta['expires'] ?>"/>
    <meta name="copyright" content="IsVipi Community Engine" />
    <meta name="generator" content="isvipi.com" />
	<meta name="application-name" content="isvipi.com" />
    <title><?php echo $meta['title'] ?></title>
    <?php echo $this->load_page_media('favicon'); ?>

    <!-- styles and scripts -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
    <?php 
        $pages->load_styles(
            array(
                ''.ICE_THEMES_URL.THEME.'/styles/css/app.css'
            ),
            'css'
        ); 
    ?>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>
	

<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Get started</h1>
							<p class="lead">
								Start creating the best possible user experience for you customers.
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<form>
										<div class="mb-3">
											<label class="form-label">Name</label>
											<input class="form-control form-control-lg" type="text" name="name" placeholder="Enter your name" />
										</div>
										<div class="mb-3">
											<label class="form-label">Company</label>
											<input class="form-control form-control-lg" type="text" name="company" placeholder="Enter your company name" />
										</div>
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email" />
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" type="password" name="password" placeholder="Enter password" />
										</div>
										<div class="text-center mt-3">
											<a href="index.html" class="btn btn-lg btn-primary">Sign up</a>
											<!-- <button type="submit" class="btn btn-lg btn-primary">Sign up</button> -->
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
    <?php 
        $pages->load_styles(
            array(
                ''.ICE_THEMES_URL.THEME.'/styles/js/app.js'
            ),
            'js'
        ); 
    ?>
</body>

</html>