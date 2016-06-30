<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<link href="<?php echo base_url(); ?>assets/css/plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/plugins/fullcalendar/fullcalendar.print.css" rel='stylesheet' media='print'>

<div class="row wrapper border-bottom white-bg page-heading push-bottom">
    <div class="col-lg-9">
        <h2><i class="<?php echo $icon; ?>"></i> <?php echo $title; ?></h2>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('employees/hr'); ?>">Home</a></li>
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

<!-- Full Calendar -->
<script src="<?php echo base_url(); ?>assets/js/plugins/fullcalendar/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/fullcalendar/fullcalendar.min.js"></script>

<script>

    $(document).ready(function() {
	    /* initialize the calendar
	     -----------------------------------------------------------------*/
	    var date = new Date();
	    var d = date.getDate();
	    var m = date.getMonth();
	    var y = date.getFullYear();

	    $('#calendar').fullCalendar({
	        header: {
	            left: 'prev,next today',
	            center: 'title',
	            right: 'month,agendaWeek,agendaDay'
	        },
	        editable: true,
	        droppable: true, // this allows things to be dropped onto the calendar
	        drop: function() {
	            // is the "remove after drop" checkbox checked?
	            if ($('#drop-remove').is(':checked')) {
	                // if so, remove the element from the "Draggable Events" list
	                $(this).remove();
	            }
	        },
	        events: [
	            {
	                title: 'All Day Event',
	                start: new Date(y, m, 1)
	            },
	            {
	                title: 'Long Event',
	                start: new Date(y, m, d-5),
	                end: new Date(y, m, d-2),
	            },
	            {
	                id: 999,
	                title: 'Repeating Event',
	                start: new Date(y, m, d-3, 16, 0),
	                allDay: false,
	            },
	            {
	                id: 999,
	                title: 'Repeating Event',
	                start: new Date(y, m, d+4, 16, 0),
	                allDay: false
	            },
	            {
	                title: 'Meeting',
	                start: new Date(y, m, d, 10, 30),
	                allDay: false
	            },
	            {
	                title: 'Lunch',
	                start: new Date(y, m, d, 12, 0),
	                end: new Date(y, m, d, 14, 0),
	                allDay: false
	            },
	            {
	                title: 'Birthday Party',
	                start: new Date(y, m, d+1, 19, 0),
	                end: new Date(y, m, d+1, 22, 30),
	                allDay: false
	            },
	            {
	                title: 'Click for Google',
	                start: new Date(y, m, 28),
	                end: new Date(y, m, 29),
	                url: 'http://google.com/'
	            }
	        ],
	    });


	});
    
</script>


<?php include_once( APPPATH.'views/includes/footer.php' ); ?>