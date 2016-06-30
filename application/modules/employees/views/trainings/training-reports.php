<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<div class="row wrapper border-bottom white-bg page-heading">
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
            <a href="<?php echo base_url('employees/trainings_requests'); ?>" class="btn btn-white m-b dim">Training Requests</a>
            <a href="<?php echo base_url('employees/trainings_reports'); ?>" class="btn btn-danger m-b dim">Training Reports</a>
        </div>       
    </div>
    
    <div class="row">
        <div class="col-lg-12 animated fadeInRight">    
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Employees Trainings <small>Here you can generate employees trainings report.</small></h5>
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

                    <form action="<?php echo base_url('employees/trainings_reports/generate_report');?>" class="form-horizontal" role="form" method="post" onsubmit="submit_date_range_form();">

                        <div class="form-group">
                            <label class="col-lg-4 control-label">Select Date Range </label>
                            <div class="col-lg-4">
                                <div id="reportrange" class="dtrange" style="width: 308px;">          
                                    <span id="date_range"></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-4 control-label" >Select Report Type</label>
                            <div class="col-lg-4">
                                <select class="chosen-select col-lg-12" id="type" name="type">
                                    <option value="trainings_attended">Trainings Attended</option>
                                    <option value="trainings_requests">Trainings Requested</option>
                                    <option value="trainings_recommended">Trainings Recommended</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-4 control-label">Select Employees </label>
                            <div class="col-lg-4">
                                <select data-placeholder="All Employees..." class="chosen-select col-lg-12"  id="employee_id[]" name="employee_id[]" multiple tabindex="4">
                                    <option value=""></option>
                                    <?php foreach($employees as $employee): ?>
                                        <option value="<?php echo $employee['id']; ?>"><?php echo $employee['first_name'].' '.$employee['last_name'].' ('.$employee['designation'].')'; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="startdate" id="startdate" value=""/>
                        <input type="hidden" name="enddate" id="enddate" value=""/>

                        <div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-4">
                                <input type="submit" class="btn btn-primary m-b pull-right dim" value="GENERATE REPORT" id="submit">
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
    function submit_date_range_form()
    {
        var daterange   =   $('#reportrange>span').html();
        var dates       =   daterange.split("-");
        $('#startdate').val(dates[0]);
        $('#enddate').val(dates[1]);
        $('#date_range_form').submit();
    }  
</script>

<?php include_once( APPPATH.'views/includes/footer.php' ); ?>

