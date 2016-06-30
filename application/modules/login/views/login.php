<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | HRMS</title>

    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name text-center">HRMS+</h1>

            </div>
            <h3>Welcome to HRMS+</h3>
            <p>HRMS+ is a collection of tools for planning, monitoring and controlling management activities and measuring business performance.
            </p>
            <form class="m-t" role="form" action="<?php echo base_url('login/login/validate_user'); ?>" method="post">
                <div class="login-form" id="login_view">
                    <p>LOGIN IN. TO SEE IT IN ACTION.</p>
                    <?php echo $this->session->flashdata('notification');?>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="USERNAME" name="user_name" required="">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="PASSWORD" name="user_password" required="">
                    </div>
                    <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                    <a href="javascript: void(0);" onclick="manage_login('login_view', 'fp_view');"><small>Forgot password?</small></a>
                </div>
            </form>
            <form class="m-t" role="form" action="<?php echo base_url('login/login/reset_password'); ?>" method="post">
                <div class="login-form" id="fp_view" style="display: none;">
                    <p>Forgot Password</p>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="EMAIL-ID" name="email">
                    </div>
                    <button type="submit" class="btn btn-primary block full-width m-b">Restore</button>
                    <div class="forgot">                       
                        <a href="javascript: void(0);" onclick="manage_login('fp_view', 'login_view');"><small>I remember my password!</small></a>
                    </div>
                </div>
            </form>
            <p class="m-t"> <small>Insights Marketing & Communication &copy; 2016</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script type="text/javascript">
        function manage_login(login_type1, login_type2)
        {
            $('#'+login_type1).hide();
            $('#'+login_type2).show();
            return true;
        }

        // $(document).ready(function() {
        //     $('.helper').delay(2500).fadeOut('slow');
        //     return true;
        // });
    </script>

</body>

</html>
