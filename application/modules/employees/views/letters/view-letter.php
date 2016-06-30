<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<div class="row wrapper border-bottom white-bg page-heading push-bottom">
    <div class="col-lg-12">
        <h2><i class="<?php echo $icon; ?>"></i> <?php echo $title; ?>
        </h2>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('employees/hr'); ?>">Home</a></li>
            <li><a href="<?php echo base_url('employees/letter'); ?>">Letters</a></li>
            <li class="active"><strong><?php echo $title; ?></strong></li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-md-12"> 
            <a href="<?php echo base_url('employees/letter/'); ?>" class="btn btn-white m-b dim">Company Letters</a>
            <a href="<?php echo base_url('employees/letter/employee_letters'); ?>" class="btn btn-danger m-b dim">Employee Letters</a>
        </div>       
    </div>
    <div class="row">
        <div class="col-lg-12 animated fadeInRight">    
            <div class="ibox float-e-margins">
                
                <div class="ibox-title">
                    <h5 class="text-center"><b><?php echo $letter['letter_subject'];?></b></h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
               

                <?php echo $this->session->flashdata('notification');?> 

                <div class="ibox-content p-xl">

                    <div class="row">
                        <div class="col-sm-12">
                        <div class="text-center">
                            <img src="<?php echo base_url() . 'file-uploads/user-account-files/logos/' . $company['logo']; ?>">
                        </div>
                    </div><br>
                    <div class="row">
                        <address>
                            <strong><?php echo $company['company_name']; ?></strong><br>
                            <?php echo $company['tag_line']; ?><br>
                            <?php echo $company['address']; ?><br>
                            <?php echo $company['city'].', '.$company['state']; ?><br>
                            <abbr title="Phone">P:</abbr><?php echo $company['contact_no']; ?>
                        </address>
                    </div>
                    <br>
                    <div class="row">
                        <p><?php echo date('M d, Y'); ?></p><br>
                    </div>
                    <div class="row">
                        <address>
                            <strong><?php echo $letter['first_name']." ".$letter['last_name']; ?><br>
                                <?php echo $letter['address']; ?><br>
                                <?php echo $letter['state'].", ".$letter['country'];?><br>
                                <?php echo $letter['pin']; ?><br>
                            </strong>
                        </address>
                    </div>
                    
                    <div class="row">
                        <p><b>Subject: <?php echo $letter['letter_subject'];?></b></p><br>
                    </div>    
                    <div class="row">
                        <p>Dear <?php echo $letter['first_name']." ".$letter['last_name']; ?></p><br>
                    </div>
                        
                    <div class="row">
                        <p><?php echo $letter['letter_body'];?></p>
                    </div>
                    </div>
                
                </div>

            </div>
        </div>
    </div>
</div>


<?php include_once( APPPATH.'views/includes/footer.php' ); ?>