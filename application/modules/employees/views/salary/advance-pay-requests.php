<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<div class="row wrapper border-bottom white-bg page-heading push-bottom">
    <div class="col-lg-9">
        <h2><i class="<?php echo $icon; ?>"></i> <?php echo $title; ?></h2>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('employees/hr'); ?>">Home</a></li>
            <li><a href="javascript:void(0);">Employees Salary</a></li>
            <li class="active"><strong><?php echo $title; ?></strong></li>
        </ol>
    </div>
</div>

         
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-md-12">  
            <a href="<?php echo base_url('employees/salary'); ?>" class="btn btn-white m-b dim">Employees Salaries</a>
            <a href="<?php echo base_url('employees/pay_requests'); ?>" class="btn btn-danger m-b dim">Advance Pay Requests</a>
            <a href="<?php echo base_url('employees/loan_requests'); ?>" class="btn btn-white m-b dim">Loan Requests</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 animated fadeInRight">    
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Advance Pay Requests <small> Here you can view employees advance pay requests and there status.</small></h5>
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
                                <th>EMP_ID</th>
                                <th>EMPLOYEE NAME</th>
                                <th>REQUEST DESCRIPTION</th>
                                <th class="text-center">AMOUNT</th>
                                <th>REQUESTED ON</th>
                                <th class="text-center">STATUS</th>
                                <th class="text-center" width="12%">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i  =   1; 
                                foreach($requests as $request): 
                            ?>
                            <tr class="gradeX">
                                <td class="text-center"><?php echo $request['employee_id']; ?></td>
                                <td><?php echo $this->Employee_Model->get_employee_name_designation($request['employee_id']); ?></td>
                                <td><?php echo $request['request_description']; ?></td>
                                <td class="text-center"><?php echo $request['amount_requested']; ?></td>
                                <td><?php echo date('jS M, Y h:i A', strtotime($request['created_at'])); ?></td>
                                <td class="text-center"><?php echo strtoupper($request['status']); ?></td>
                                <td class="text-center">                                    
                                    <?php if($request['status'] == 'active'): ?>
                                        <a href="<?php echo base_url('employees/pay_requests/edit/'.$request['id']); ?>"><i class="fa fa-edit fa-2x"></i></a>
                                        <a href="<?php echo base_url('employees/pay_requests/approve/'.$request['id']); ?>" title="Approve Pay request" onclick="return confirm('ARE YOU SURE YOU WANT TO APPROVE PAY REQUEST?')"><i class="fa fa-thumbs-o-up fa-2x"></i></a>
                                        <a href="<?php echo base_url('employees/pay_requests/reject/'.$request['id']); ?>" title="Reject Pay request" onclick="return confirm('ARE YOU SURE YOU WANT TO REJECT PAY REQUEST?')"><i class="fa fa-thumbs-o-down fa-2x"></i></a>
                                    <?php endif; ?>
                                        <a href="<?php echo base_url('employees/pay_requests/delete/'.$request['id']); ?>" title="Delete Pay request" onclick="return confirm('ARE YOU SURE YOU WANT TO DELETE THE PAY REQUEST?')"><i class="fa fa-trash fa-2x red"></i></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>EMP_ID</th>
                                <th>EMPLOYEE NAME</th>
                                <th>REQUEST DESCRIPTION</th>
                                <th>AMOUNT</th>
                                <th>REQUESTED ON</th>
                                <th class="text-center">STATUS</th>
                                <th class="text-center">ACTIONS</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>

        </div>
    </div>
</div>

<?php include_once( APPPATH.'views/includes/footer.php' ); ?>