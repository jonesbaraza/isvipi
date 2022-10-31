<?php
    if(isset($_POST['isv_install']) && !empty($_POST['isv_install'])){
        require_once(ICE_BUILD . 'installer/process.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="copyright" content="IsVipi Community Engine" />
        <meta name="generator" content="isvipi.com" />
        <meta name="application-name" content="isvipi.com" />
        <title>IsVipi Community Edition - Installer</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="<?php echo ICE_BUILD_URL .'media/favicon.ico' ?>" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?php echo ICE_BUILD_URL .'installer/styles/css/styles.css' ?>" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-dark bg-primary navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="<?php echo ICE_URL ?>">IsVipi Community Edition - Installer</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="//isvipi.com/docs" target="_blank">Docs</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" target="_blank" href="//isvipi.com/contact">Support</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page content-->
        <div class="container">

            <div class="text-center mt-5">
                <h1>IsVipi Community Edition - Installer</h1>
                <p class="lead">This is the installer for IsVipi Community Edition <?php echo VERSION ?></p>
                <?php if(isset($_SESSION['error']) && !empty($_SESSION['error'])){?>
                    <div class="alert alert-danger"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
                <?php } ?>
            </div>
            <div class="card">
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                <input type="hidden" name="isv_install" value="<?php echo md5(microtime()) ?>">
                    <h5 class="card-header">Site Details</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Site Url</label>
                                <input type="text" class="form-control" name="site" value="<?php if(isset($_SESSION['ins']['url'])){ echo $_SESSION['ins']['url']; } ?>" placeholder="e.g. http://isvipi.com/" required>
                            </div>
                            <div class="col">
                                <label class="form-label">Site Title</label>
                                <input type="text" class="form-control" name="stitle" value="<?php if(isset($_SESSION['ins']['stitle'])){ echo $_SESSION['ins']['stitle']; } ?>" placeholder="e.g. My Social Network" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Site Email</label>
                                <input type="email" class="form-control" name="semail" value="<?php if(isset($_SESSION['ins']['semail'])){ echo $_SESSION['ins']['semail']; } ?>" placeholder="e.g. support@mysite.com" required>
                            </div>
                            <div class="col">
                                <label class="form-label">Site Type</label>
                                <select name="stype" class="form-control">
                                    <option value="1">Social Network</option>
                                    <option value="2">Dating Site</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <h5 class="card-header">Database Details</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Database Name</label>
                                <input type="text" class="form-control" name="dbname" value="<?php if(isset($_SESSION['ins']['dbname'])){ echo $_SESSION['ins']['dbname']; } ?>" required>
                            </div>
                            <div class="col">
                                <label class="form-label">Database User</label>
                                <input type="text" class="form-control" name="dbuser" value="<?php if(isset($_SESSION['ins']['dbuser'])){ echo $_SESSION['ins']['dbuser']; } ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Database Password</label>
                                <input type="text" class="form-control" name="dbpwd" value="<?php if(isset($_SESSION['ins']['dbpwd'])){ echo $_SESSION['ins']['dbpwd']; } ?>" required>
                            </div>
                            <div class="col">
                                <label class="form-label">Database Host</label>
                                <input type="text" class="form-control" name="dbhost" value="localhost" required>
                            </div>
                        </div>
                    </div>
                    <h5 class="card-header">Admin Details</h5>
                    <div class="card-body">
                    <div class="row">
                        <div class="col">
                                <label class="form-label">Admin First Name</label>
                                <input type="text" class="form-control" name="admfname" value="<?php if(isset($_SESSION['ins']['admfname'])){ echo $_SESSION['ins']['admfname']; } ?>" required>
                            </div>
                            <div class="col">
                                <label class="form-label">Admin Last Name</label>
                                <input type="text" class="form-control" name="admlname" value="<?php if(isset($_SESSION['ins']['admlname'])){ echo $_SESSION['ins']['admlname']; } ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Admin Email</label>
                                <input type="text" class="form-control" name="admemail" value="<?php if(isset($_SESSION['ins']['admemail'])){ echo $_SESSION['ins']['admemail']; } ?>" required>
                            </div>
                            <div class="col">
                                <label class="form-label">Admin Password</label>
                                <input type="text" class="form-control" name="admpwd" value="<?php if(isset($_SESSION['ins']['admpwd'])){ echo $_SESSION['ins']['admpwd']; } ?>" required>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="<?php echo ICE_BUILD_URL .'installer/styles/js/scripts.js' ?>"></script>
    </body>
</html>