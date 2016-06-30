<div id="page-wrapper" class="gray-bg">
<div class="row border-bottom">
<nav class="navbar navbar-static-top  white-bg" role="navigation" style="margin-bottom: 0">
	<div class="navbar-header">
	    <a class="navbar-minimalize minimalize-styl-2 btn btn-danger" href="#"><i class="fa fa-bars"></i> </a>

        <?php
            if($this->session->userdata['designation'] !== 'Admin'):
                if($this->session->userdata('login_at') == null && $this->session->userdata('logout_at') ==null)
                {
                    echo '<button class="btn btn-primary" style="margin-top:12px;" onclick="login()">TIME IN </button>';
                }
                else
                {
                    if($this->session->userdata('login_at') !== null && $this->session->userdata('logout_at') == null)
                    {
                        echo '<button class="btn btn-primary" style="margin-top:12px;">'.$this->session->userdata('login_at').'</button> ';
                        echo '<button class="btn btn-primary" style="margin-top:12px;" onclick="logout()"> TIME OUT </button>';
                    }

                }
            endif;
        ?>
	    
	</div>
    <ul class="nav navbar-top-links navbar-right">
        <li>
            <span class="m-r-sm text-muted welcome-message">Hi <?php echo $this->session->userdata['name']; ?>! Welcome to HRMS+</span>
        </li>

        <?php $unread_notifications   =   $this->Notifications_Model->get_unread_notifications($this->session->userdata['id']); ?>
        <li class="dropdown">
            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                <i class="fa fa-bell"></i>  
                <?php if($nots = count($unread_notifications)): ?>
                    <span class="label label-warning"><?php echo $nots; ?></span>
                <?php endif; ?>
            </a>
            <ul class="dropdown-menu dropdown-messages">
                <div style="max-height: 300px; overflow: auto;">
                <?php foreach($unread_notifications as $notification): ?>
                    <li>
                        <div class="dropdown-messages-box">
                            <a href="javascript:void(0);" class="pull-left">
                                <img alt="image" class="img-circle" src="<?php echo base_url('file-uploads/user-account-files/avatars/'.$notification['avatar']); ?>">
                            </a>
                            <div class="media-body pointer" onclick="update_notification(<?php echo $notification['id']; ?>); window.location='<?php echo base_url($notification['url']); ?>';">
                                <strong><?php echo $notification['first_name'].' '.$notification['last_name']; ?></strong> <br>
                                <?php echo $notification['text']; ?><br>
                                <small class="text-muted"><?php echo date('jS F, Y', strtotime($notification['created_at'])); ?> <i class="fa fa-clock-o"></i> <?php echo date('h:i A', strtotime($notification['created_at'])); ?></small>
                            </div>
                        </div>
                    </li>
                    <li class="divider"></li>
                <?php endforeach; ?>
                </div>
                <li>
                    <div class="text-center link-block">
                        <a href="javascript:void(0);">
                            <i class="fa fa-bell-o"></i> <strong>You have <?php echo $nots; ?> Notifications</strong>
                        </a>
                    </div>
                </li>
            </ul>
        </li>

        <li>
            <a href="<?php echo base_url('login/login/do_logout'); ?>">
                <i class="fa fa-sign-out"></i> Log out
            </a>
        </li>
    </ul>

</nav>
</div>

<script type="text/javascript">
    
    function login()
    {   
        window.location.href="<?php echo base_url('login/login/timein'); ?>";
        return true;
    }

    function logout()
    {   
        if(confirm("DO YOU WANT TO SET TIME OUT NOW?"))
            window.location.href="<?php echo base_url('login/login/timeout'); ?>";        
        return true;       
    }
    
</script>