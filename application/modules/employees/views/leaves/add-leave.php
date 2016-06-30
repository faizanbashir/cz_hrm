<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<link href="<?php echo base_url(); ?>assets/js/plugins/timepicker/jquery.datetimepicker.css" rel="stylesheet">

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-md-9">
        <h2><i class="<?php echo $icon; ?>"></i> <?php echo $title; ?></h2>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('employees/hr'); ?>">Home</a></li>
            <li><a href="<?php echo base_url('employees/leaves'); ?>">Leaves</a></li>
            <li class="active"><strong><?php echo $title; ?></strong></li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-md-12 animated fadeInRight">    
            <div class="ibox float-e-margins">
               
                <div class="ibox-title">
                    <h5>Add Leave <small><?php if(isset($leave['id'])) echo "Here you can edit a leave."; else echo "Here you can add a leave.";?></small></h5>
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
                    
                    <form action="<?php if(isset($leave['id'])) echo base_url('employees/leaves/edit/'.$leave['id']); else echo base_url('employees/leaves/add');?>" class="form-horizontal" role="form" method="post">
                         <div class="row">
                                <div class="col-md-6-offset-4">                           
                                    
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Enter Leave Title </label>
                                        <div class="col-md-5">
                                            <input class="form-control required " type="text" id="leave_name" name= "leave_name" value="<?php if(isset($leave['id'])) echo $leave['leave_name'];?>">
                                        </div>
                                    </div>   
                                    <div class="form-group">
                                       <label class="col-md-4 control-label">Enter Leave Description </label>
                                         <div class="col-md-5">
                                             <textarea class="form-control required" type="text" id="leave_description" name= "leave_description" rows="5"><?php if(isset($leave['id'])) echo $leave['leave_description'];?></textarea>
                                         </div>
                                    </div>                           
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Yearly Leaves </label>
                                        <div class="col-md-5">
                                            <input class="form-control required " type="text" id="yearly_leaves" name= "yearly_leaves" value="<?php if(isset($leave['id'])) echo $leave['yearly_leaves'];?>">
                                        </div>
                                    </div>   
                                   
      
                                    <div class="form-group">
                                        <label class="col-md-4 control-label"></label>
                                        <div class="col-md-5">
                                            <input type="submit" class="btn btn-primary m-b pull-right dim" value="<?php if(isset($leave['id'])) echo "UPDATE LEAVE"; else echo "ADD LEAVE" ?>" id="submit">
                                        </div>
                                   </div>
                             </div>
                        </div>
                    </form>
                </div>
            </div>
          
        </div>
    </div>
</div>




<?php include_once( APPPATH.'views/includes/footer.php' ); ?>