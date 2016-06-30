    <div class="footer fixed">
            <div class="pull-right">
                10GB of <strong>250GB</strong> Free.
            </div>
            <div>
                BMS+ &copy; 2016 | Insights Marketing & Communication | All rights reserved
            </div>
        </div>
        </div>
    </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Flot -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/flot/jquery.flot.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/flot/jquery.flot.symbol.js"></script>

    <!-- Peity -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/peity/jquery.peity.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url(); ?>assets/js/inspinia.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- Jvectormap -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

    <!-- EayPIE -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/easypiechart/jquery.easypiechart.js"></script>

    <!-- Sparkline -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Full Calendar-->     
    <script src="<?php echo base_url(); ?>assets/js/plugins/fullcalendar/moment.min.js"></script>

    <!-- iCheck -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/iCheck/icheck.min.js"></script>-->

    <!-- Sparkline demo data  -->
    <script src="<?php echo base_url(); ?>assets/js/demo/sparkline-demo.js"></script> 

    <!-- Full Calendar -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/fullcalendar/fullcalendar.min.js"></script>

    <!-- Chosen -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/chosen/chosen.jquery.js"></script>

    <!-- Data Tables -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/dataTables/dataTables.responsive.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/dataTables/dataTables.tableTools.min.js"></script>

    <!-- Date Range -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/moment.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/daterangepicker/daterangepicker.js"></script>
    <link href="<?php echo base_url();?>assets/js/plugins/records-range/records-range.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/plugins/records-range/records-range.js"></script>

    <script>

    $(document).ready(function() {

        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });

        /* initialize the external events
         -----------------------------------------------------------------*/


        $('#external-events div.external-event').each(function() {

            // store data so the calendar knows to render an event upon drop
            $(this).data('event', {
                title: $.trim($(this).text()), // use the element's text as the event title
                stick: true // maintain when user navigates (see docs on the renderEvent method)
            });

            // make the event draggable using jQuery UI
            $(this).draggable({
                zIndex: 1111999,
                revert: true,      // will cause the event to go back to its
                revertDuration: 0  //  original position after the drag
            });

        });


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

    <script>
        $(document).ready(function() {
            $('.chart').easyPieChart({
                barColor: '#f8ac59',
//                scaleColor: false,
                scaleLength: 5,
                lineWidth: 4,
                size: 80
            });

            $('.chart2').easyPieChart({
                barColor: '#1c84c6',
//                scaleColor: false,
                scaleLength: 5,
                lineWidth: 4,
                size: 80
            });

            var data2 = [
                [gd(2012, 1, 1), 7], [gd(2012, 1, 2), 6], [gd(2012, 1, 3), 4], [gd(2012, 1, 4), 8],
                [gd(2012, 1, 5), 9], [gd(2012, 1, 6), 7], [gd(2012, 1, 7), 5], [gd(2012, 1, 8), 4],
                [gd(2012, 1, 9), 7], [gd(2012, 1, 10), 8], [gd(2012, 1, 11), 9], [gd(2012, 1, 12), 6],
                [gd(2012, 1, 13), 4], [gd(2012, 1, 14), 5], [gd(2012, 1, 15), 11], [gd(2012, 1, 16), 8],
                [gd(2012, 1, 17), 8], [gd(2012, 1, 18), 11], [gd(2012, 1, 19), 11], [gd(2012, 1, 20), 6],
                [gd(2012, 1, 21), 6], [gd(2012, 1, 22), 8], [gd(2012, 1, 23), 11], [gd(2012, 1, 24), 13],
                [gd(2012, 1, 25), 7], [gd(2012, 1, 26), 9], [gd(2012, 1, 27), 9], [gd(2012, 1, 28), 8],
                [gd(2012, 1, 29), 5], [gd(2012, 1, 30), 8], [gd(2012, 1, 31), 25]
            ];

            var data3 = [
                [gd(2012, 1, 1), 800], [gd(2012, 1, 2), 500], [gd(2012, 1, 3), 600], [gd(2012, 1, 4), 700],
                [gd(2012, 1, 5), 500], [gd(2012, 1, 6), 456], [gd(2012, 1, 7), 800], [gd(2012, 1, 8), 589],
                [gd(2012, 1, 9), 467], [gd(2012, 1, 10), 876], [gd(2012, 1, 11), 689], [gd(2012, 1, 12), 700],
                [gd(2012, 1, 13), 500], [gd(2012, 1, 14), 600], [gd(2012, 1, 15), 700], [gd(2012, 1, 16), 786],
                [gd(2012, 1, 17), 345], [gd(2012, 1, 18), 888], [gd(2012, 1, 19), 888], [gd(2012, 1, 20), 888],
                [gd(2012, 1, 21), 987], [gd(2012, 1, 22), 444], [gd(2012, 1, 23), 999], [gd(2012, 1, 24), 567],
                [gd(2012, 1, 25), 786], [gd(2012, 1, 26), 666], [gd(2012, 1, 27), 888], [gd(2012, 1, 28), 900],
                [gd(2012, 1, 29), 178], [gd(2012, 1, 30), 555], [gd(2012, 1, 31), 993]
            ];


            var dataset = [
                {
                    label: "Number of orders",
                    data: data3,
                    color: "#1ab394",
                    bars: {
                        show: true,
                        align: "center",
                        barWidth: 24 * 60 * 60 * 600,
                        lineWidth:0
                    }

                }, {
                    label: "Payments",
                    data: data2,
                    yaxis: 2,
                    color: "#464f88",
                    lines: {
                        lineWidth:1,
                            show: true,
                            fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 0.2
                            }, {
                                opacity: 0.2
                            }]
                        }
                    },
                    splines: {
                        show: false,
                        tension: 0.6,
                        lineWidth: 1,
                        fill: 0.1
                    },
                }
            ];


            var options = {
                xaxis: {
                    mode: "time",
                    tickSize: [3, "day"],
                    tickLength: 0,
                    axisLabel: "Date",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: 'Arial',
                    axisLabelPadding: 10,
                    color: "#838383"
                },
                yaxes: [{
                    position: "left",
                    max: 1070,
                    color: "#838383",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: 'Arial',
                    axisLabelPadding: 3
                }, {
                    position: "right",
                    clolor: "#838383",
                    axisLabelUseCanvas: true,
                    axisLabelFontSizePixels: 12,
                    axisLabelFontFamily: ' Arial',
                    axisLabelPadding: 67
                }
                ],
                legend: {
                    noColumns: 1,
                    labelBoxBorderColor: "#000000",
                    position: "nw"
                },
                grid: {
                    hoverable: false,
                    borderWidth: 0,
                    color: '#838383'
                }
            };

            function gd(year, month, day) {
                return new Date(year, month - 1, day).getTime();
            }

            var previousPoint = null, previousLabel = null;

            $.plot($("#flot-dashboard-chart"), dataset, options);

            var mapData = {
                "US": 298,
                "SA": 200,
                "DE": 220,
                "FR": 540,
                "CN": 120,
                "AU": 760,
                "BR": 550,
                "IN": 200,
                "GB": 120,
            };

            $('#world-map').vectorMap({
                map: 'world_mill_en',
                backgroundColor: "transparent",
                regionStyle: {
                    initial: {
                        fill: '#e4e4e4',
                        "fill-opacity": 0.9,
                        stroke: 'none',
                        "stroke-width": 0,
                        "stroke-opacity": 0
                    }
                },

                series: {
                    regions: [{
                        values: mapData,
                        scale: ["#1ab394", "#22d6b1"],
                        normalizeFunction: 'polynomial'
                    }]
                },
            });
        });
    </script>

        <script type="text/javascript">

        function update_notification(id)
        {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url()."user/notifications/update_notification";?>',
                data: {id: id}      
            });

            return true;
        }

        $(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });           
        });
        

        $('.datepicker').datepicker({ });

        $('.input-daterange').datepicker({
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true
        });

        var date = new Date();
        date.setDate(date.getDate());

        $('.date-picker-disable-future-dates').datepicker({ 
            endDate: date
        });

        $('.date-picker-disable-past-dates').datepicker({ 
            startDate: date
        });


        $('.only-numbers').keypress(function(e) {
            var a = [];
            var k = e.which;

            for (i = 48; i < 58; i++)
                a.push(i);

            if (!(a.indexOf(k)>=0))
            {
                if(k != 45){
                    e.preventDefault();
                }
            }
        });


        $(function() 
        {
            $('.only-alphabets').bind('keyup input',function()
            {       
                if (this.value.match(/[^a-zA-Z áéíóúÁÉÍÓÚüÜ]/g)) 
                {
                    this.value = this.value.replace(/[^a-zA-Z áéíóúÁÉÍÓÚüÜ]/g, '');
                }
            });
        });

        
        $(document).ready(function() {
            $('.dataTables-example').dataTable({
                responsive: true,
                "dom": 'T<"clear">lfrtip',
                "tableTools": {
                    "sSwfPath": "<?php echo base_url(); ?>assets/js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
                }
            });
        });

        var config = {
                    '.chosen-select'           : {},
                    '.chosen-select-deselect'  : {allow_single_deselect:true},
                    '.chosen-select-no-single' : {disable_search_threshold:11},
                    '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
                    '.chosen-select-width'     : {width:"95%"}
                }
        for (var selector in config) {
            $(selector).chosen(config[selector]);
        }

        $(document).ready(function() {
            $('.helper').delay(4000).fadeOut('slow');
            return true;
        });

    </script>


    <?php if($this->input->post('startdate') && $this->input->post('enddate')): ?>
        <script type="text/javascript">
            $(function(){        
                /* reportrange */
                if($("#reportrange").length > 0){   
                    $("#reportrange").daterangepicker({                    
                        ranges: {
                           'Till Today': [moment('01/01/2016'), moment()],
                           'Today': [moment(), moment()],
                           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                           'This Month': [moment().startOf('month'), moment().endOf('month')],
                           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                        },
                        opens: 'left',
                        buttonClasses: ['btn btn-default'],
                        applyClass: 'btn-small btn-primary',
                        cancelClass: 'btn-small',
                        format: 'MMM.DD.YYYY',
                        separator: ' to ',
                        startDate: "<?php echo date('M d, Y', strtotime($this->input->post('startdate'))); ?>",
                        endDate: "<?php echo date('M d, Y', strtotime($this->input->post('enddate'))); ?>"            
                      },function(start, end) {
                          $('#reportrange span').html(start.format('MMM D, YYYY') + ' - ' + end.format('MMM D, YYYY'));
                    });
                    
                    $("#reportrange span").html("<?php echo date('M d, Y', strtotime($this->input->post('startdate'))); ?>" + ' - ' + "<?php echo date('M d, Y', strtotime($this->input->post('enddate'))); ?>");
                }
                /* end reportrange */   
                
            });
        </script>
    <?php endif; ?>

</body>
</html>
