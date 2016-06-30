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
            <form onsubmit="return checkMatchPass();" action="<?php echo base_url('login/login/activate_account/'.$id);?>" method="post">
                <div class="login-form" id="login_view">
                    <p>RESTORE PASSWORD. TO SEE IT IN ACTION.</p>
                    <div id="warning"></div>
                    <?php echo $this->session->flashdata('notification');?>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="ENTER PASSWORD" id="password1" name="password1" required="">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="CONFIRM PASSWORD" id="password2" name="password2" required="">
                    </div>
                    <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                </div>
            </form>
            
            <p class="m-t"> <small>Insights Marketing & Communication &copy; 2016</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script type="text/javascript">

        function checkMatchPass()
        {
            var pass1 = document.getElementById('password1').value;
            var pass2 = document.getElementById('password2').value;

            if( pass1 == pass2 )
            {
                return true;
            }      
            else
            { 
                document.getElementById('password1').value = null;
                document.getElementById('password2').value = null;
                document.getElementById('warning').innerHTML='<div class="alert alert-danger helper"><button class="close" data-dismiss="alert">×</button>Entered passwords do not match, please check and submit again.</div>';       
                return false;
            }
       
        }

    </script>

</body>
</html>