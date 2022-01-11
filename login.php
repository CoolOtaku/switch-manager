<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    <!-- Icon -->
    <link rel="apple-touch-icon" href="/img/switch.png" sizes="180x180">
    <link rel="icon" href="/img/switch.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/img/switch.png" sizes="16x16" type="image/png">
    <link rel="mask-icon" href="/img/switch.png" color="#7952b3">
    <link rel="icon" href="/img/switch.png">

    <link rel="stylesheet" href="./css/bootstrap.dir/bootstrap.css">
    <link rel="stylesheet" href="./css/from_login/login.css">

</head>
<body>
    
<div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-2"></div>
            <div class="col-lg-6 col-md-8 login-box rounded-3">
                <div class="col-lg-12 login-key">
                    <svg xmlns="http://www.w3.org/2000/svg" width="55" height="55" fill="white" class="bi bi-key-fill" viewBox="0 0 16 16">
                        <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                    </svg>
                </div>
                <div class="col-lg-12 login-title">
                    ADMIN PANEL
                </div>

                <div class="col-lg-12 login-form">
                    <div class="col-lg-12 login-form">
                        <form>
                            <input type="hidden" name="action" id="action" value="login">
                            <div id="login-form">
                                <div class="form-group">
                                    <label class="form-control-label">LOGIN</label>
                                    <input type="text" class="form-control" name="login_text" id="login_text">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">PASSWORD</label>
                                    <input type="password" class="form-control" name="password_text" id="password_text">
                                </div>
                            </div>

                            <div class="col-lg-12 loginbttm">
                                <div class="col-12 login-btm login-text">
                                    <?php
                                        if(isset($_GET['response'])) {
                                            echo $_GET['response'];
                                        }
                                    ?>
                                </div>
                                <div class="col-12 login-btm login-button d-flex justify-content-center">
                                    <button type="button" id="login" class="btn btn-outline-primary me-3">LOGIN</button>
                                    <button type="reset" class="btn btn-outline-danger">CLEAR</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2"></div>
            </div>
        </div>

        <script src="./js/1jquery.dir/jquery-3.6.0.min.js"></script>
        <script src="./js/2bootstrap.dir/bootstrap.js"></script>
        <script src="./js/from_login/scripts.js"></script>
</body>
</html>