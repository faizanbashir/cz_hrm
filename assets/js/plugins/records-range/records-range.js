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
            startDate: moment('01/01/2016'),
            endDate: moment()            
          },function(start, end) {
              $('#reportrange span').html(start.format('MMM D, YYYY') + ' - ' + end.format('MMM D, YYYY'));
        });
        
        $("#reportrange span").html(moment('01/01/2016').format('MMM D, YYYY') + ' - ' + moment().format('MMM D, YYYY'));
    }
    /* end reportrange */   
    
});

