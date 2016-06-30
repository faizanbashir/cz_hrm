<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<div class="row wrapper border-bottom white-bg page-heading push-bottom">
    <div class="col-lg-9">
        <h2><i class="<?php echo $icon; ?>"></i> <?php echo $title; ?></h2>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('employees/hr'); ?>">Home</a></li>
            <li>Trainings</li>
            <li class="active"><strong><?php echo $title; ?></strong></li>   
        </ol>
    </div>
</div>
 
<div class="wrapper wrapper-content">
    
    <div class="row">
        <div class="col-md-12"> 
            <a href="<?php echo base_url('employees/trainings_attended'); ?>" class="btn btn-white m-b dim">Trainings Attended</a>
            <a href="<?php echo base_url('employees/trainings_recommended'); ?>" class="btn btn-white m-b dim">Trainings Recommended</a>
            <a href="<?php echo base_url('employees/trainings_requests'); ?>" class="btn btn-danger m-b dim">Training Requests</a>
            <a href="<?php echo base_url('employees/trainings_reports'); ?>" class="btn btn-white m-b dim">Training Reports</a>
        </div>       
    </div>
    
    <div class="row">
        <div class="col-lg-12 animated fadeInRight">  
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Request Training <small> Here you can request training.</small></h5>
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

                    <form action="<?php echo (isset($training['id']) ? base_url()."employees/trainings_requests/edit/".$training['id'] : base_url('employees/trainings_requests/add'));?>" class="form-horizontal" role="form" method="post">

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Training Name </label>
                            <div class="col-lg-5">
                                <input class="form-control" type="text" name= "training_title" value="<?php if(isset($training['id'])) echo $training['training_title']; ?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Training Description </label>
                            <div class="col-lg-5">
                                <textarea class="form-control" name= "training_description" rows="5" required><?php if(isset($training['id'])) echo $training['training_description']; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Location Country </label>
                            <div class="col-lg-5">
                                <select class="chosen-select col-lg-12" id="country" name="country" required="">                         
                                </select>
                            </div>
                        </div>  

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Location State </label>
                            <div class="col-lg-5">
                                <select class="chosen-select col-lg-12" id="state" name="state" required="">
                                    <option>Select State</option>
                                </select>
                            </div>
                        </div>   

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Location City </label>
                            <div class="col-lg-5">
                                <input class="form-control" type="text" name="city" value="<?php if(isset($training['id'])) echo $training['training_city']; ?>" required>
                            </div>
                        </div>  

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Training Start - End</label>
                            <div class="input-daterange input-group col-lg-5">
                                <input type="text" class="input-sm form-control" name="training_start" value="<?php if(isset($training['id'])) echo date('m/d/Y', strtotime($training['training_start'])); ?>"/>
                                <span class="input-group-addon">to</span>
                                <input type="text" class="input-sm form-control" name="training_end" value="<?php if(isset($training['id'])) echo date('m/d/Y', strtotime($training['training_end'])); ?>" />
                            </div>
                        </div>                                        
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-5">
                                <input type="submit" class="btn btn-primary m-b pull-right dim" value="<?php echo (isset($training['id']) ? 'UPDATE' : 'ADD');?> TRAINING" id="submit">
                                <span></span>
                            </div>
                        </div>
                </form>
            </div>
        </div> 
     </div> 
</div>

<script type="text/javascript" src="<?php echo base_url().'assets/js/countries.js'; ?>"></script>

<script language="javascript">
    populateCountries("country", "state");
</script>

<?php if(isset($training['training_country']) && isset($training['training_state'])): ?>
    <script language="javascript">
        $("#country").val("<?php echo $training['training_country'];?>");
        $("#country").change();
        $("#state").val("<?php echo $training['training_state'];?>");
    </script>  
<?php endif; ?>

<?php include_once( APPPATH.'views/includes/footer.php' ); ?>    

