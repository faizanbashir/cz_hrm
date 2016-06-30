<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<link href="<?php echo base_url(); ?>assets/js/plugins/timepicker/jquery.datetimepicker.css" rel="stylesheet">

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-12">
        <h2><i class="<?php echo $icon; ?>"></i> <?php echo $title; ?></h2>
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
        <div class="col-md-12 animated fadeInRight">    
            <div class="ibox float-e-margins">
               
                <div class="ibox-title">
                    <h5><?php echo '<b>'.$letter['letter_subject']."<b>(<small>".$letter['first_name']." ".$letter['last_name'].")</small>";?></h5>
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
                    
                   <div class="row">
                        <div class="col-md-6-offset-4">                           
                                    
                            <div class="form-group">
                                <label class="col-md-4 control-label">Recipient </label>
                                <div class="col-md-5">
                                    <input class="form-control" type="text" value="<?php echo $letter['first_name']." ".$letter['last_name']; ?>">       
                                </div>
                            </div> 

                            <div class="form-group">
                                <label class="col-md-4 control-label">Subject </label>
                                <div class="col-md-5">
                                    <textarea class="form-control" type="text"><?php echo $letter['letter_subject']; ?></textarea>
                                </div>
                            </div>                           
      
                            <div class="form-group">
                                <label class="col-md-4 control-label">Body</label>
                                <div class="col-md-5">
                                    <textarea class="form-control" type="text" rows="20"><?php echo $letter['letter_body']; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
          
        </div>
    </div>
</div>


<?php include_once( APPPATH.'views/includes/footer.php' ); 