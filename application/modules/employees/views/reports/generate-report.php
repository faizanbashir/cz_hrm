<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<link href="<?php echo base_url(); ?>assets/js/plugins/timepicker/jquery.datetimepicker.css" rel="stylesheet">

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        <h2><i class="<?php echo $icon; ?>"></i> <?php echo $title; ?></h2>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('employees/hr'); ?>">Home</a></li>
            <li><a href="<?php echo base_url('employees/reports'); ?>">Reports</a></li>
            <li class="active"><strong><?php echo $title; ?></strong></li>
        </ol>
    </div>
</div>
 
<div class="wrapper wrapper-content">

    <div class="row">
        <div class="col-lg-12 animated fadeInRight">    
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Generate Reports <small>Here you can generate reports.</small></h5>
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

                    <form action="<?php echo base_url('employees/reports/generate_report');?>" class="form-horizontal" role="form" method="post" onsubmit="submit_date_range_form();">

                        <div class="form-group" >
                            <label class="col-lg-4 control-label">Select Report Type</label>
                            <div class="col-lg-4">
                                <select data-placeholder="Select an option..."  onchange="manage_reporting(this.value);" class="chosen-select-no-single col-lg-12" name="type" id="type">
                                    <option value=""></option>
                                    <option value="attendance_report">Attendance Report</option>
                                    <option value="leaves_report">Leaves Report</option>
                                    <option value="travelling_report">Travelling Report</option>
                                    <option value="late_sitting_report">Late Sitting Report</option>
                                    <option value="off_day_report">Off Day Report</option>
                                    <option value="missing_time_report">Missing Time OUT or IN Report</option>
                                </select>
                            </div>
                        </div>

                         <div class="form-group" id="date_range">
                            <label class="col-lg-4 control-label">Select Date Range </label>
                            <div class="col-lg-4">
                                <div id="reportrange" class="dtrange" style="width: 308px;">          
                                    <span id="date_range"></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group" id="date" style="display: none;">
                            <label class="col-md-4 control-label">Select Month-Year: </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="date" 
                                id="datetimepicker" />
                                
                            </div>
                        </div> 
                   
                        <div class="form-group" id="multi-select">
                            <label class="col-lg-4 control-label">Select Employees </label>
                            <div class="col-lg-4">
                                <select data-placeholder="All Employees..." class="chosen-select" multiple style="width:100%;" tabindex="4" name="employee_id[]" id="multi_employee_id">
                                    <option value=""></option>
                                    <?php foreach($employees as $employee): ?>
                                        <option value="<?php echo $employee['id']; ?>"><?php echo $employee['first_name'].' '.$employee['last_name'].' ('.$employee['designation'].')'; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group" id="single-select" style="display: none;">
                            <label class="col-lg-4 control-label">Select Employee </label>
                            <div class="col-lg-4">
                                <select title="Select Employee..." class="select col-md-12"  tabindex="4" name="single_employee_id" id="single_employee_id">
                                    <option value=""></option>
                                    <?php 
                                        foreach($employees as $employee): 
                                    ?>
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

<script src="<?php echo base_url(); ?>assets/js/plugins/timepicker/jquery.datetimepicker.full.js"></script>
<script type="text/javascript">
    function submit_date_range_form()
    {
        var daterange   =   $('#reportrange>span').html();
        var dates       =   daterange.split("-");
        $('#startdate').val(dates[0]);
        $('#enddate').val(dates[1]);
        $('#date_range_form').submit();
    }  

    $('#datetimepicker').datetimepicker({
        timepicker: false,
        format: 'M y'
    });

   function manage_reporting(report_type)
    {
        if(report_type)
        {
            if(report_type == 'attendance_report')
            {
                $("#single-select").show();
                $("#single_employee_id").attr("required", true);
                $("#multi-select").hide();
                $("#date").show();
                $("#date").attr("required", true);
                $("#date_range").hide();

            }
            else
            {
                $("#single-select").hide();
                $("#single_employee_id").attr("required", false);
                $("#multi-select").show();
                $("#date").hide();
                $("#date").attr("required", false);
                $("#date_range").show();
            }
        }

        return false;
    }
</script>

<?php include_once( APPPATH.'views/includes/footer.php' ); ?>

