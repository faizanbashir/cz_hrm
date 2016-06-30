<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<link href="<?php echo base_url(); ?>assets/js/plugins/timepicker/jquery.datetimepicker.css" rel="stylesheet">

<div class="row wrapper border-bottom white-bg page-heading push-bottom">
    <div class="col-lg-9">
        <h2><i class="<?php echo $icon; ?>"></i> <?php echo $title; ?>
        </h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo base_url('employees/hr'); ?>">Home</a>
            </li>
            <li class="active"><strong><?php echo $title; ?></strong></li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-md-12"> 
            <a href="<?php echo base_url('employees/attendance/'); ?>" class="btn btn-danger m-b dim">Attendance</a>
            <a href="<?php echo base_url('employees/attendance/extra_hours'); ?>" class="btn btn-white m-b dim">Extra Hours</a>
            <a href="<?php echo base_url('employees/attendance/off_days'); ?>" class="btn btn-white m-b dim">Off-Days</a>
            <a href="<?php echo base_url('employees/attendance/missing_time'); ?>" class="btn btn-white m-b dim">Missed TIME-IN/TIME-OUT</a>
        </div>       
    </div>
    <div class="row">
        <div class="col-lg-12 animated fadeInRight">    
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Employees Attendance<small> <?php if($this->input->post('date')) echo date('jS M, Y', strtotime($this->input->post('date'))); else echo date('jS M, Y'); ?>.</small></h5>
                    <div class="ibox-tools">
                        <div style="float: left; margin-top: -1%;">
                            <form action="<?php echo base_url('employees/attendance') ?>" method="post">
                                <label>Date </label>
                                <input type="text" name="date" class="date-picker-disable-future-dates" value="<?php if($this->input->post('date')) echo date('m/d/Y', strtotime($this->input->post('date'))); else echo date('m/d/Y'); ?>">
                                <span>
                                <button type="submit" class="btn btn-sm btn-primary btn-xs"> Go!</button></span>
                            </form>
                        </div>
                        <a class="collapse-link pull-right">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link pull-right">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <?php echo $this->session->flashdata('notification');?> 
                    <table class="table table-striped table-bordered table-hover" >
                        <thead>
                            <tr>
                                <th class="text-center">EMP ID</th>
                                <th>EMP NAME</th>
                                <th>DESIGNATION</th>
                                <th class="text-center" width="10%">TIME IN</th>
                                <th class="text-center" width="10%">TIME OUT</th>
                                <th class="text-center" width="12%">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $junk = '';
                                if(isset($result))
                                    $junk = $result;
                                else
                                    $junk = $login;
                                foreach($junk as $login): 
                            ?> 
                            <form action="<?php echo base_url('employees/attendance/update_login/'.$login['id']); ?>" method="POST">
                                <tr class="gradeX">
                                    <td class="text-center"><?php echo $login['employee_id'];?></td>
                                    <td><?php echo $login['first_name'].' '.$login['last_name'];?>
                                    </td>
                                    <td><?php echo $login['designation'];?></td>
                                    <td class="text-center">
                                        <center><input class="form-control timepicker required " type="text" id="time_in" name= "time_in" value="<?php echo $login['logged_in_at'];?>"></center>
                                    </td>
                                    <td class="text-center">
                                        <?php 
                                            if($login['logged_out_at'])
                                               echo '<center><input class="form-control timepicker required" type="text" name= "time_out" value="'.$login['logged_out_at'].'"></center>';
                                            else
                                                echo '<center><input type="text" class="form-control timepicker" name="time_out" required/></center>';
                                        ?>
                                    </td>
                                    <input type="hidden" name="attendance_date" value="<?php echo date('Y-m-d', strtotime($login['created_at'])); ?>"/>
                                    <td class="text-center">
                                        <button type="submit" class="btn btn-danger btn-sm">UPDATE</button>
                                    </td>
                                </tr>
                            </form>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="text-center">EMP ID</th>
                                <th>EMP NAME</th>
                                <th>DESIGNATION</th>
                                <th class="text-center" width="15%">TIME IN</th>
                                <th class="text-center" width="15%">TIME OUT</th>
                                <th class="text-center" width="12%">ACTIONS</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>assets/js/plugins/timepicker/jquery.datetimepicker.full.js"></script>

<script type="text/javascript">
    $('.timepicker').datetimepicker({
        datepicker:false,
        format:'H:i',
        step:5
    });
</script>

<?php include_once( APPPATH.'views/includes/footer.php' ); ?>