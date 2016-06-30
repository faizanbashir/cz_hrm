<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<div class="row wrapper border-bottom white-bg page-heading push-bottom">
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
                    <h5>Attendance Report<small> Here you can view attendance report of employees.</small></h5>
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
                    <?php 
                        $date     =   date('M, Y', strtotime($this->input->post('date'))); 
                    ?>

                    <form action="#" method="POST">
                    <div class="row"><strong><?php echo $date; ?></strong></div>
                        <table class="table table-striped table-bordered table-hover" >
                            <thead>
                                <tr>
                                    <th>S.NO</th>
                                    <th>EMPLOYEE NAME</th>
                                    <th>DESIGNATION</th>
                                    <th>LOGIN DAY</th>
                                    <th>DATE</th>
                                    <th class="text-center">TIME-IN</th>
                                    <th class="text-center">TIME-OUT</th>
                                    <th>TIME SPENT<br>(hh:mm)</th>
                                    <th> MISSING TIME<br>(hh:mm)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $working_days       =   0;
                                    $total_time_spend   =   0;
                                    $total_time_missing =   0;
                                    foreach($report['attendance'] as $row):
                                ?>
                                <tr class="gradeX">
                                    <td class="text-center"><?php echo ++$working_days;?></td>
                                    <!-- <td class="text-center"><?php //echo $report['employee_id'];?></td> -->
                                    <td><?php echo $row['first_name']." ".$row['last_name'];?></td>
                                    <td><?php echo $row['designation'];?></td>
                                    <td><?php echo date('l', strtotime($row['created_at'])); ?> </td>
                                    <td><?php echo date('jS M, Y', strtotime($row['created_at']));?></td>
                                    <td class="text-center"><?php echo $row['logged_in_at'];?></td>
                                    <td class="text-center"><?php echo $row['logged_out_at'];?></td>
                                    <td class="text-center">
                                        <?php
                                            if($row['logged_out_at'])
                                            {
                                                $time_in    =   new DateTime($row['logged_in_at']);
                                                $time_out   =   new DateTime($row['logged_out_at']);
                                                $interval   =   $time_out->diff($time_in);
                                                $total_time_spend   +=   ($interval->format('%h') * 60) + $interval->format('%i');
                                                echo $interval->format('%H:%I');
                                            }
                                        ?>  
                                    </td>
                                    <td class="text-center">
                                        <?php
                                            if($row['logged_out_at'])
                                            {
                                                $hours      =   $interval->format('%h');
                                                $minutes    =   $interval->format('%i');
                                                $missing    =   ($hours * 60) + $minutes;
                                                //echo "hours: ".$hours."<br>minutes: ".$minutes."<br>working".$missing; 
                                                $total_minutes  =   9 * 60;
                                                if($total_minutes > $missing)
                                                {
                                                    $total_time_missing   +=   $total_minutes - $missing;
                                                    echo date('H:i', mktime(0, ($total_minutes - $missing)));
                                                    //echo '<br>total missing: '.$total_time_missing;
                                                }

                                            }
                                        ?>  
                                    </td>
                                </tr>
                            <?php endforeach;  ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>S.NO</th>
                                    <th>EMPLOYEE NAME</th>
                                    <th>DESIGNATION</th>
                                    <th>LOGIN DAY</th>
                                    <th>DATE</th>
                                    <th class="text-center">TIME-IN</th>
                                    <th class="text-center">TIME-OUT</th>
                                    <th>TIME SPENT<br>(hh:mm)</th>
                                    <th> MISSING TIME<br>(hh:mm)</th>
                                </tr>
                            </tfoot>
                        </table>

                        <table class="table table-striped table-bordered table-hover" >
                                <thead>

                                    <tr class="warning">
                                        <td class="text-center"><i class="fa fa-circle"></i></td>
                                        <td>Total Working Days for <?php echo $date; ?>.</td>
                                        <td class="text-center"><?php echo $working_days;?> Days</td>
                                    </tr>

                                    <tr class="warning">
                                        <td class="text-center"><i class="fa fa-circle"></i></td>
                                        <td>Total Weekends for <?php echo $date; ?>.</td>
                                        <td class="text-center"><?php echo $weekends;?> Days</td>
                                    </tr>

                                    <tr class="warning">
                                        <td class="text-center"><i class="fa fa-circle"></i></td>
                                        <td>Total Approved Full Day Leaves for <?php echo $date; ?>.</td>
                                        <td class="text-center"><?php echo $approved_leaves;?> Days</td>
                                    </tr>

                                    <tr class="warning">
                                        <td class="text-center"><i class="fa fa-circle"></i></td>
                                        <td>Total Approved Half Days for <?php echo $date; ?>.</td>
                                        <td class="text-center"><?php print_r($half_days);?></td>
                                    </tr>

                                    <tr class="warning">
                                        <td class="text-center"><i class="fa fa-circle"></i></td>
                                        <td>Total Working Hours (hh:mm) for <?php echo $date; ?>.</td>
                                        <td class="text-center"><?php echo intval($total_time_spend/60).':'.$total_time_spend%60;?></td>
                                    </tr>

                                    <tr class="warning">
                                        <td class="text-center"><i class="fa fa-circle"></i></td>
                                        <td>Total Missing Hours (hh:mm) for <?php echo $date; ?>.</td>
                                        <td class="text-center"><?php echo intval($total_time_missing/60).':'.$total_time_missing%60;?></td>
                                    </tr>

                                    <tr class="warning">
                                        <td class="text-center"><i class="fa fa-circle"></i></td>
                                        <td>Average Time In for <?php echo $date; ?>.</td>
                                        <td class="text-center"><?php echo date('h:i A', strtotime($report['average_logged_in']['logged_in_at']));?></td>
                                    </tr>

                                    <tr class="warning">
                                        <td class="text-center"><i class="fa fa-circle"></i></td>
                                        <td>Average Time Out for <?php echo $date; ?>.</td>
                                        <td class="text-center"><?php echo date('h:i A', strtotime($report['average_logged_out_in']['logged_out_at']));?></td>
                                    </tr>

                                    <tr class="warning">
                                        <td class="text-center"><i class="fa fa-circle"></i></td>
                                        <td>Holidays for <?php echo $date; ?>.</td>
                                        <td class="text-center"><?php echo $holidays;?> Days</td>
                                    </tr>

                                    <tr class="warning">
                                        <td class="text-center"><i class="fa fa-circle"></i></td>
                                        <td>Total Off Days for <?php echo $date; ?>.</td>
                                        <td class="text-center"><?php echo $off_days;?> Days</td>
                                    </tr>

                                    <tr class="warning">
                                        <td class="text-center"><i class="fa fa-circle"></i></td>
                                        <td>Total Late Sitting Hours for <?php echo $date; ?>.</td>
                                        <td class="text-center"><?php echo intval($extra_hours/60).':'.$extra_hours%60;?></td>
                                    </tr>

                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<?php include_once( APPPATH.'views/includes/footer.php' ); ?>