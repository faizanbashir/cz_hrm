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
                    <h5>Off Day Reports<small> Here you can view off day reports of employees.</small></h5>
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
                                    <th>OFF DATE</th>
                                    <th class="text-center">STATUS</th>                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($report as $row):?>
                                <tr class="gradeX">
                                    <td class="text-center"><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['first_name']." ".$row['last_name']; ?></td>
                                    <td><?php echo $row['designation']; ?></td>
                                    <td><?php echo date('jS M, Y', strtotime($row['date'])); ?></td>
                                    <td class="text-center"><span class="btn btn-success btn-xs"><small><b><?php echo strtoupper($row['status']); ?></b></small></span></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th width="8%">EMP ID</th>
                                    <th>EMPLOYEE NAME</Sth>
                                    <th>DESIGNATION</th>
                                    <th>OFF DATE</th>
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