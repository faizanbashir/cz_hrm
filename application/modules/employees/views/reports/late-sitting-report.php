<?php include_once( APPPATH.'views/includes/header.php' ); ?>



<link href="<?php echo base_url(); ?>assets/js/plugins/timepicker/jquery.timepicker.css" rel="stylesheet">

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
                    <h5>Extra Work Hours Reports<small> Here you can view extra work hours reports of employees.</small></h5>
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
                                    <th class="text-center">EMP ID</th>
                                    <th>EMPLOYEE NAME</th>
                                    <th>DESIGNATION</th>
                                    <th>DATE</th>
                                    <th class="text-center">EXTRA HOURS</th>
                                    <th class="text-center">STATUS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($report as $report):?>    
                                <tr class="gradeX">
                                    <td class="text-center"><?php echo $report['employee_id'];?></td>
                                    <td><?php echo $report['first_name']." ".$report['last_name'];?></td>
                                    <td><?php echo $report['designation']; ?></td>
                                    <td><?php echo date('jS M, Y', strtotime($report['date'])); ?></td>
                                    <td class="text-center"><?php echo $report['hours']; ?> Hrs</td>
                                    <td class="text-center"><span class="btn btn-success btn-xs"><small><b><?php echo strtoupper($report['status']); ?></b></small></span></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-center">EMP ID</th>
                                    <th>EMPLOYEE NAME</th>
                                    <th>DESIGNATION</th>
                                    <th>DATE</th>
                                    <th class="text-center">EXTRA HOURS</th>
                                    <th class="text-center">STATUS</th>
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