<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<link href="<?php echo base_url(); ?>assets/js/plugins/timepicker/jquery.datetimepicker.css" rel="stylesheet">

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-md-9">
        <h2><i class="<?php echo $icon; ?>"></i> <?php echo $title; ?></h2>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>">Home</a></li>
            <li>Personal</li>
            <li><a href="<?php echo base_url('user/personal/leaves'); ?>">Leaves</a></li>
            <li class="active"><strong><?php echo $title; ?></strong></li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-md-12 animated fadeInRight">    
            <div class="ibox float-e-margins">
               
                <div class="ibox-title">
                    <h5><?php if(isset($leave['id'])) echo "EDIT LEAVE"; else echo "REQUEST LEAVE" ;?> <small><?php if(isset($leave['id'])) echo " Here you can edit a leave."; else echo " Here you can request a leave"; ?></small></h5>
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
                    <?php echo $this->session->flashdata('notification');?> 

                    <form action="<?php if(isset($leave['id'])) echo base_url('employees/leaves/edit_leave/'.$leave['id']); else echo base_url('user/personal/request_leave'); ?>" class="form-horizontal" role="form" method="post">
                        <div class="row">
                            <div class="col-md-6-offset-4">                           
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Enter Leave Name </label>
                                    <div class="col-md-5">
                                    
                                        <select required class="form-control" name="leave_id" id="leave_id" >
                                            <option value=""></option>
                                                <?php foreach($leaves as $row): ?>
                                                    <option value="<?php echo $row['id']; ?>" >
                                                        <?php echo $row['leave_name']; ?></option>
                                                <?php endforeach; ?>
                                        </select>
                                   
                                    </div>
                                </div>

                                <div class="form-group" >
                                    <label class="col-md-4 control-label">From - To</label>
                                    <div class="input-daterange input-group col-md-5">
                                        <input type="text" class="input-sm form-control" name="leave_from" id="leave_from" value="<?php if(isset($leave['id'])) echo date('m/d/Y', strtotime($leave['leave_from'])); ?>" />
                                        <span class="input-group-addon">to</span>
                                        <input type="text" class="input-sm form-control" name="leave_to" id="leave_to" value="<?php if(isset($leave['id'])) echo date('m/d/Y', strtotime($leave['leave_to'])); ?>" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Subject</label>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" name="subject" id="subject" value="<?php if(isset($leave['id'])) echo $leave['subject']; ?>"/>
                                    </div>
                                </div> 

                                <div class="form-group">
                                   <label class="col-md-4 control-label">Enter Leave Description </label>
                                     <div class="col-md-5">
                                         <textarea class="form-control required" type="text" id="leave_description" name= "leave_description" rows="5"><?php if(isset($leave['id'])) echo $leave['leave_description']; ?></textarea>
                                     </div>
                                </div>                           
                                <div class="form-group">
                                    <label class="col-md-4 control-label"></label>
                                    <div class="col-md-5">
                                        <input type="submit" class="btn btn-primary m-b pull-right dim" value="<?php if(isset($leave['id'])) echo "SAVE CHANGES"; else echo "REQUEST LEAVE";?>" id="submit">
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

<?php if(isset($leave['id'])): ?>
<script type="text/javascript">
var leaves   =   [<?php echo $leave['leave_id']; ?>];
        $('#leave_id').val(leaves);

</script>
<?php endif; ?>

<?php include_once( APPPATH.'views/includes/footer.php' ); ?>