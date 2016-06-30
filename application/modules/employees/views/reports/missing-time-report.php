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
                    <h5>Missing Time-In / Time-Out Reports<small> Here you can view missing time-in or time-out reports of employees.</small></h5>
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
                    <form action="#" method="POST">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                                <tr>
                                    <th width="8%">EMP ID</th>
                                    <th>EMPLOYEE NAME</th>
                                    <th>DESIGNATION</th>
                                    <th>MISSING DATE</th>
                                    <th class="text-center">TIME-IN</th>
                                    <th class="text-center">TIME-OUT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($report as $time):?>
                                <tr class="gradeX">
                                    <td class="text-center"><?php echo $time['id'];?></td>
                                    <td><?php echo $time['first_name']." ".$time['last_name'];?></td>
                                    <td><?php echo $time['designation'];?></td>
                                    <td><?php echo date('jS M, Y', strtotime($time['created_at']));?></td>
                                    <td class="text-center"><?php echo $time['logged_in_at'];?></td>
                                    <td class="text-center"><?php if(isset($time['logged_out_at'])) echo $time['logged_out_at']; else echo '<span class="label label-danger">Missing</span>';?></td>
                                </tr>
                            <?php endforeach ;?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th width="8%">EMP ID</th>
                                    <th>EMPLOYEE NAME</th>
                                    <th>DESIGNATION</th>
                                    <th>MISSING DATE</th>
                                    <th class="text-center">TIME-IN</th>
                                    <th class="text-center">TIME-OUT</th>
                                </tr>
                            </tfoot>
                        </table>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<?php include_once( APPPATH.'views/includes/footer.php' ); ?>