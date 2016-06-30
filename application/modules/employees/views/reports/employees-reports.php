<?php include_once( APPPATH.'views/includes/header.php' ); ?>

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
                    <h5>Employees Report <small>Here you can generate employees report.</small></h5>
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

                    <form onsubmit="return checkMatchPass();" action="<?php echo base_url('employees/hr/attendance_reports');?>" class="form-horizontal" role="form" method="post">

                        <div class="form-group">
                            <label class="col-lg-4 control-label">Select Date Range </label>
                            <div class="col-lg-4">
                                <div id="reportrange" class="dtrange" style="width: 308px;">          
                                    <span id="date_range"></span><b class="caret" style="margin-left: 70px;"></b>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-4 control-label">Select Report Type</label>
                            <div class="col-lg-4">
                                <select class="form-control">
                                    <option>Report Type 1</option>
                                    <option>Report Type 2</option>
                                    <option>Report Type 3</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-4 control-label">Select Employees </label>
                            <div class="col-lg-4">
                                <select data-placeholder="Choose Employees..." class="chosen-select" multiple style="width:310px;" tabindex="4">
                                    <option value="">Select</option>
                                    <option value="United States">Employee 1</option>
                                    <option value="United Kingdom">Employee 2</option>
                                    <option value="Afghanistan">Employee 3</option>
                                </select>
                            </div>
                        </div>

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

