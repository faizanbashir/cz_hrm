<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<div class="row wrapper border-bottom white-bg page-heading push-bottom">
    <div class="col-lg-9">
        <h2><i class="<?php echo $icon; ?>"></i> <?php echo $title; ?></h2>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>">Home</a></li>
            <li>Settings</li>
            <li class="active"><strong>Change Password</strong></li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12 animated fadeInRight">    
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Change Password <small>Here you can change your password.</small></h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div id="warning"></div>
                    <?php echo $this->session->flashdata('notification');?> 

                    <form onsubmit="return checkMatchPass();" action="<?php echo base_url('settings/user/update_password');?>" class="form-horizontal" role="form" method="post">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Old Password </label>
                            <div class="col-lg-8">
                                <input class="form-control" type="password" name= "old_password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">New Password </label>
                            <div class="col-lg-8">
                                <input class="form-control" type="password" id="password1" name= "password1" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Confirm Password </label>
                            <div class="col-lg-8">
                                <input class="form-control" type="password" id="password2" name="password2" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-8">
                                <input type="submit" class="btn btn-primary m-b pull-right dim" value="UPDATE PASSWORD" id="submit">
                                <span></span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

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

<?php include_once( APPPATH.'views/includes/footer.php' ); ?>