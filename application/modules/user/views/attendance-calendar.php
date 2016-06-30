<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<script src="<?php echo base_url() ?>assets/js/plugins/gcal.js" type="text/javascript"></script>
<link href="<?php echo base_url(); ?>assets/css/plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/plugins/fullcalendar/fullcalendar.print.css" rel='stylesheet' media='print'>

<div class="row wrapper border-bottom white-bg page-heading push-bottom">
    <div class="col-lg-9">
        <h2><i class="<?php echo $icon; ?>"></i> <?php echo $title; ?></h2>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>">Home</a></li>
            <li>Employees</li>
            <li class="active"><strong><?php echo $title; ?></strong></li>
        </ol>
    </div>
</div>



<div class="wrapper wrapper-content">
    <div class="row animated fadeInDown">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Employees Calendar </h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">Config option 1</a>
                            </li>
                            <li><a href="#">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include_once( APPPATH.'views/includes/footer.php' ); ?>

<script src="<?php echo base_url(); ?>assets/js/plugins/fullcalendar/fullcalendar.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/fullcalendar/gcal.js"></script>

<script>

    $(document).ready(function() {

        $('#calendar').fullCalendar({
            googleCalendarApiKey: 'AIzaSyCBypmKf5Md3YB1dGrnzemSEoWUwH-FXBg'
            , events: {
                googleCalendarId: 'faizan.ibn.bashir@gmail.com',
                className: 'gcal-event'
            }
        });
    });
    

    $('.fc-day-grid-event > .fc-content').css('text-align', 'center');
    
</script>

<?php //echo '<script>alert("'.$start.'")</script>'; ?>
