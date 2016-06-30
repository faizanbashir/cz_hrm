<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<div class="row wrapper border-bottom white-bg page-heading push-bottom">
    <div class="col-lg-9">
        <h2><i class="<?php echo $icon; ?>"></i> <?php echo $title; ?></h2>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>">Home</a></li>
            <li class="active"><strong>Our Team</strong></li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12 animated fadeInRight">    
            <?php foreach($employees as $team):?>
            <div class="col-lg-4">
                <div class="contact-box">
                    <a href="javascript:void(0);">
                    <div class="col-sm-4">
                        <div class="text-center">
                            <img alt="image" class="img-circle m-t-xs img-responsive" src="<?php echo base_url('file-uploads/user-account-files/avatars/'.$team['avatar']);?>" >
                            <div class="m-t-xs font-bold"><?php echo $team['designation'] ;?></div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <h3><strong><?php echo $team['first_name']." ".$team['last_name']; ?></strong></h3>
                        <p><i class="fa fa-map-marker"></i><?php echo " ".$team['state'].", <br>".$team['country'];?></p>
                        <address>
                            <?php echo $team['address'];?><br>
                            <?php echo " ".$team['city'];?>,
                            <?php echo " ".$team['pin'];?><br>
                            
                            <i class="fa fa-phone"></i><?php echo " ".$team['contact_no'];?><br>
                            <i class="fa fa-mobile"></i>&nbsp;<?php echo " ".$team['mobile_no'];?><br>
                            <small><u><?php echo " ".$team['email'];?></u></small>
                        </address>
                    </div>
                    <div class="clearfix"></div>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('.contact-box').each(function() {
            animationHover(this, 'pulse');
        });
    });
</script>

<?php include_once( APPPATH.'views/includes/footer.php' ); ?>