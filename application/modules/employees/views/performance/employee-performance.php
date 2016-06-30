<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<div class="row wrapper border-bottom white-bg page-heading push-bottom">
    <div class="col-lg-12">
        <h2>
            <i class="<?php echo $icon; ?>"></i> <?php echo $title; ?>
            
        </h2>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('employees/hr'); ?>">Home</a></li>
            <li><a href="<?php echo base_url('employees/performance_report'); ?>">Employee Performance</a></li>
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
                                <th width="8%;">S NO</th>
                                <th>SUBMITTED BY</th>                 
                                <th>SUBMITTED TO</th>
                                <th>SUBMITTED ON</th>
                                <th class="text-center">VIEW</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $count = 1; foreach($reports as $report): ?>
                                <tr>
                                    <td><?php echo $count++; ?></td>
                                    <td><?php echo $this->Employee_Model->get_employee_name_designation($report['submitted_by']); ?></td>
                                    <td><?php echo $this->Employee_Model->get_employee_name_designation($report['submitted_to']); ?></td>
                                    <td>
                                        <?php echo date('jS M, Y', strtotime($report['submitted_on'])); ?>
                                    </td>
                                    <td class="text-center">
                                        <a href="<?php echo base_url('file-uploads/user-account-files/performance-reports/Report_'.$report['id'].'.pdf'); ?>" target="_blank"><i class="fa fa-eye fa-2x"></i></a>
                                        <a href="<?php echo base_url('employees/performance_report/delete/'.$report['employee_id'].'/'.$report['id']); ?>" onclick="return confirm('ARE YOU SURE YOU WANT TO DELETE THE REPORT?')"><i class="fa fa-trash-o fa-2x"></i></a>
                                    </td>                                          
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th width="8%;">S NO</th>
                                <th>SUBMITTED BY</th>                 
                                <th>SUBMITTED TO</th>
                                <th>SUBMITTED ON</th>
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