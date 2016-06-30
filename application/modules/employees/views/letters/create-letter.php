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
                    <h5><?php echo $title; ?> <small><?php if(isset($letter['id'])) echo "Here you can edit a letter."; else echo "here you can create a letter."; ?></small></h5>
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
                    
                    <form action="<?php if(isset($letter['id'])) echo base_url('employees/letter/edit_letter/'.$letter['id']);  else echo base_url('employees/letter/create');?>" class="form-horizontal" role="form" method="post">
                         <div class="row">
                                <div class="col-md-6-offset-4">                           
                                    
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Select Type: </label>
                                        <div class="col-md-5">
                                            <select data-placeholder="Select Letter Type..." class="form-control" name="letter_type" id="letter_type">
                                                <option value=""></option>
                                                <?php foreach($categories as $row): ?>
                                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['category_title']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Recipient: </label>
                                        <div class="col-md-5">
                                            <select data-placeholder="Select Recipient..." class="form-control" name="recipient" id="recipient">
                                                <option value=""></option>
                                                <?php foreach($employees as $employee): ?>
                                                    <option value="<?php echo $employee['id']; ?>"><?php echo $employee['first_name'].' '.$employee['last_name']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                            
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Enter Subject </label>
                                        <div class="col-md-5">
                                            <input class="form-control required" style="width:100%;" type="text" id="letter_subject" name= "letter_subject" >
                                        </div>
                                    </div>                                   
                                    
                                    <div class="form-group">
                                       <label class="col-md-4 control-label">Enter Body </label>
                                         <div class="col-md-5">
                                             <textarea class="form-control required" style="width:100%;" type="text" id="letter_body" name= "letter_body"></textarea>
                                         </div>
                                    </div>                           
      
                                    <div class="form-group">
                                        <label class="col-md-4 control-label"></label>
                                        <div class="col-md-5">
                                            <input type="submit" class="btn btn-primary m-b pull-right dim" value="<?php if(isset($letter['id'])) echo "SAVE CHANGES"; else echo "CREATE"; ?>" id="submit">
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

<?php if(isset($letter['id'])): ?>
    <script language="javascript">
        
        $("#letter_type").val("<?php echo $letter['category_id'];?>");
        $("#recipient").val("<?php echo $letter['recipient'];?>");
        $("#letter_subject").val("<?php echo $letter['letter_subject'];?>");
        $("#letter_body").val("<?php echo $letter['letter_body'];?>");

    </script>
<?php endif; ?>
 

<?php include_once( APPPATH.'views/includes/footer.php' ); ?>