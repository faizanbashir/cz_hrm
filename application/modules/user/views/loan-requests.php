<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<div class="row wrapper border-bottom white-bg page-heading push-bottom">
    <div class="col-lg-12">
        <h2><i class="<?php echo $icon; ?>"></i> <?php echo $title; ?>
            <a href="<?php echo base_url('user/personal/request_loan'); ?>" class="btn btn-success btn-xs pull-right"><i class="fa fa-plus"></i> REQUEST LOAN</a></h2>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>">Home</a></li>
            <li><a href="<?php echo base_url('employees/hr'); ?>">HR Management</a></li>
            <li><a href="javascript:void(0);">Employees Salary</a></li>
            <li class="active"><strong><?php echo $title; ?></strong></li>
        </ol>
    </div>
</div>

         
<div class="wrapper wrapper-content">
    
    </div>
    <div class="row">
        <div class="col-lg-12 animated fadeInRight">    
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Loan Requests <small> Here you can view loan requests and their status.</small></h5>
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
                                <th>REQUEST DESCRIPTION</th>
                                <th class="text-center">AMOUNT</th>
                                <th>REQUESTED ON</th>
                                <th class="text-center">STATUS</th>
                                </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i  =   1; 
                                foreach($requests as $request): 
                            ?>
                            <tr class="gradeX">
                                <td><?php echo $request['loan_description']; ?></td>
                                <td class="text-center"><?php echo $request['loan_amount']; ?></td>
                                <td><?php echo date('jS M, Y h:i A', strtotime($request['created_at'])); ?></td>
                                <td class="text-center"><span class="btn btn-success btn-xs"><small><b><?php echo strtoupper($request['status']); ?></b></small></span></td>
                                 </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>REQUEST DESCRIPTION</th>
                                <th>AMOUNT</th>
                                <th>REQUESTED ON</th>
                                <th class="text-center">STATUS</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>

        </div>
    </div>
</div>

<?php include_once( APPPATH.'views/includes/footer.php' ); ?>