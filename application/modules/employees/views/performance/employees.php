<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<div class="row wrapper border-bottom white-bg page-heading push-bottom">
    <div class="col-lg-12">
        <h2>
            <i class="<?php echo $icon; ?>"></i> <?php echo $title; ?>
            <a href="<?php echo base_url('employees/performance_report/add_report'); ?>" class="btn btn-success btn-xs pull-right"><i class="fa fa-plus"></i> Upload Report</a>
            
        </h2>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('employees/hr'); ?>">Home</a></li>
            <li class="active"><strong><?php echo $title; ?></strong></li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content">

    <div class="row">
        <div class="col-lg-12 animated fadeInRight">    
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>View Employee performance Report <small> Here you can manage employees performace reports.</small></h5>
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

                    <?php echo $this->session->flashdata('notification');?>
                    
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                            <tr>
                                <th width="8%;">EMP ID</th>
                                <th>EMPLOYEE NAME</th> 
                                <th>DESINATION</th>                
                                <th>OFFICE</th>
                                <th class="text-center">VIEW</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($employees as $employee): ?>
                            
                            <tr>
                                <td><?php echo $employee['employee_id']; ?></td>
                                <td><?php echo $employee['first_name'].' '.$employee['last_name']; ?></td>
                                <td><?php echo $employee['designation']; ?></td>
                                <td>Kashmir</td>
                                <td class="text-center"><a href="<?php echo base_url('employees/performance_report/employee_performance/'.$employee['employee_id']); ?>" title="Performance Reports"><i class="fa fa-list fa-2x"></i></a></td>
                            </tr>
                            
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th width="8%;">EMP ID</th>
                                <th>EMPLOYEE NAME</th>
                                <th>DESINATION</th>                     
                                <th>OFFICE</th>
                                <th class="text-center">VIEW</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>

        </div>
    </div>
</div>


<?php include_once( APPPATH.'views/includes/footer.php' ); ?>