<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<div class="row wrapper border-bottom white-bg page-heading push-bottom">
    <div class="col-lg-11">
        <h2>
            <i class="<?php echo $icon; ?>"></i> <?php echo $title; ?>
        </h2>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('employees/hr'); ?>">Home</a></li>
            <li><a href="javascript:void(0);">Employees</a></li>
            <li class="active"><strong><?php echo $title; ?></strong></li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content">

   <div class="row">
        <div class="col-md-12">  
            <a href="<?php echo base_url('employees/salary'); ?>" class="btn btn-danger m-b dim">Employees Salaries</a>
            <a href="<?php echo base_url('employees/pay_requests'); ?>" class="btn btn-white m-b dim">Advance Pay Requests</a>
            <a href="<?php echo base_url('employees/loan_requests'); ?>" class="btn btn-white m-b dim">Loan Requests</a>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-12 animated fadeInRight">    
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?php echo $this->Employee_Model->get_employee_name_designation($this->uri->segment(4)); ?> <small> Salary Timeline </small></h5>
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
                    <table class="table table-striped table-bordered table-hover" >
                        <thead>
                            <tr>
                                <th>CREATED AT</th>
                                <th>CREATED BY</th>
                                <th>LAST UPDATED AT</th>
                                <th>LAST UPDATED BY</th>
                                <th class="text-center">BASIC SALARY</th>
                                <th class="text-center">HOUSE ALLOWANCE</th>
                                <th class="text-center">TRAVELLING ALLOWANCE</th>
                                <th class="text-center">OTHER ALLOWANCE</th>
                                <th class="text-center">SALARY</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($salaries as $salary): ?>
                            <tr class="gradeA">
                                <td><?php echo date('jS M, Y h:i A', strtotime($salary['created_at'])); ?></td>
                                <td><?php echo $this->Employee_Model->get_employee_name_designation($salary['created_by']); ?></td>
                                <td>
                                    <?php 
                                        if($salary['last_updated_at'])
                                            echo date('jS M, Y h:i A', strtotime($salary['last_updated_at'])); 
                                    ?>
                                </td> 
                                <td>
                                    <?php
                                        if($salary['last_updated_by']) 
                                            echo $this->Employee_Model->get_employee_name_designation($salary['last_updated_by']); 
                                    ?>
                                </td>                    
                                <td class="text-center"><?php echo $salary['basic_salary']; ?></td>
                                <td class="text-center"><?php echo $salary['house_allowance']; ?></td>
                                <td class="text-center"><?php echo $salary['travelling_allowance']; ?></td>
                                <td class="text-center"><?php echo $salary['other_allowance']; ?></td>
                                <td class="text-center"><?php echo $salary['salary']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>CREATED AT</th>
                            <th>CREATED BY</th>
                            <th>LAST UPDATED AT</th>
                            <th>LAST UPDATED BY</th>
                            <th class="text-center">BASIC SALARY</th>
                            <th class="text-center">HOUSE ALLOWANCE</th>
                            <th class="text-center">TRAVELLING ALLOWANCE</th>
                            <th class="text-center">OTHER ALLOWANCE</th>
                            <th class="text-center">SALARY</th>
                        </tr>
                    </tfoot>
                 </table>
              </div>
          </div>
       </div>
    </div>
</div>

<?php include_once( APPPATH.'views/includes/footer.php' ); ?>