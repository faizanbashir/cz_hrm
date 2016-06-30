<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<div class="row wrapper border-bottom white-bg page-heading push-bottom">
    <div class="col-lg-9">
        <h2><i class="<?php echo $icon; ?> "></i><?php echo $title; ?></h2>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('employees/hr'); ?>">Home</a></li>
            <li>Trainings</li>
            <li class="active"><strong><?php echo $title; ?></strong></li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12 animated fadeInRight">    
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?php echo $title;?><small> Here you can view <?php echo $title;?>.</small></h5>
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
                                    <th>EMPLOYEEE NAME</th>
                                    <th>TRAINING TITLE</th>
                                    <th>TRAINING DESCRIPTION</th>
                                    <th>LOCATION</th>
                                    <th>TRAINING FROM - TRAINING TO</th>
                                    <th class="text-center">STATUS</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($report as $report):?>
                                <tr class="gradeX">
                                    <td class="text-center"><?php echo $report['id'];?></td>
                                    <td><?php echo $report['first_name']." ".$report['last_name'];?><br><?php echo $report['designation'];?></td>
                                    <td><?php echo $report['training_title'];?></td>
                                    <td><?php echo $report['training_description'];?></td>
                                    <td><?php echo $report['training_country']."<br>".$report['training_state']."<br>".$report['training_city'];?></td>
                                    <td><?php echo date('jS M, Y', strtotime($report['training_start'])).' <b>-</b> '.date('jS M, Y', strtotime($report['training_end']));?></td>
                                    <td class="text-center"><span class="btn btn-success btn-xs"><small><b><?php echo strtoupper($report['status']);?></b></small></td>
                                </tr>
                             <?php endforeach; ?>   
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-center">EMP ID</th>
                                    <th>EMPLOYEE NAME</th>
                                    <th>TRAINING TITLE</th>
                                    <th>TRAINING DESCRIPTION</th>
                                    <th>LOCATION</th>
                                    <th>FROM - TO</th>
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