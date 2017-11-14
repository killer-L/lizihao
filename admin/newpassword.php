<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="#" type="image/png">

    <title>修改密码</title>

    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="login-body">

<div class="container">

    <form class="form-signin" method= "post" action="newpassworddo.php">
        <div class="form-signin-heading text-center">
            <h1 class="sign-title">修改密码</h1>
            <img src="../images/login-logo.png" alt=""/>
        </div>
        <div class="login-wrap">
                                            <input type="password" class="form-control" placeholder="Old Password " name='oldpassword'/>
                                            <input type="password" class="form-control"  placeholder="New Password" name='password' />
                                                                                        <input type="password" class="form-control"  placeholder="Again Input" name='password1' />
                                            
            <button class="btn btn-lg btn-login btn-block" type="submit">
                <i class="fa fa-check"></i>
            </button>

            <div class="registration">
              未注册?
                <a class="" href="registration.html">
                    点击注册
                </a>
            </div>
            <label class="checkbox">
                <input type="checkbox" value="remember-me"> 记住我
                
            </label>

        </div>

    

    </form>

</div>



<!-- Placed js at the end of the document so the pages load faster -->

<!-- Placed js at the end of the document so the pages load faster -->
<script src="../js/jquery-1.10.2.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/modernizr.min.js"></script>

</body>
</html>
