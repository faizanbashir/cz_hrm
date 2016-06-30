<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<div class="row wrapper border-bottom white-bg page-heading push-bottom">
    <div class="col-lg-11">
        <h2>
            <i class="<?php echo $icon; ?>"></i> <?php echo $title; ?>
        </h2>
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
            <a href="<?php echo base_url('employees/salary'); ?>" class="btn btn-danger m-b dim">Employees Salaries</a>
            <a href="<?php echo base_url('employees/pay_requests'); ?>" class="btn btn-white m-b dim">Advance Pay Requests</a>
            <a href="<?php echo base_url('employees/loan_requests'); ?>" class="btn btn-white m-b dim">Loan Requests</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 animated fadeInRight">    
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>View Employee Salary <small> Here you can manage employee Salary.</small></h5>
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
                                <th class="text-center">EMP_ID</th>
                                <th>EMPLOYEE NAME</th>
                                <th>DESIGNATION</th>
                                <th class="text-center">BASIC SALARY</th>
                                <th class="text-center">HOUSE ALLOWANCE</th>
                                <th class="text-center">TRAVELLING ALLOWANCE</th>
                                <th class="text-center">OTHER ALLOWANCE</th>
                                <th class="text-center">SALARY</th>
                                <th class="text-center" width="12%">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($salaries as $salary): ?>
                            <tr class="gradeA">
                                <td class="text-center"><?php echo $salary['id']; ?></td>
                                <td><?php echo $salary['first_name'].' '.$salary['last_name']; ?></td>
                                <td><?php echo $salary['designation']; ?></td> 
                                <td class="text-center"><?php echo $salary['basic_salary']; ?></td>
                                <td class="text-center"><?php echo $salary['house_allowance']; ?></td>
                                <td class="text-center"><?php echo $salary['travelling_allowance']; ?></td>
                                <td class="text-center"><?php echo $salary['other_allowance']; ?></td>
                                <td class="text-center"><?php echo $salary['salary']; ?></td>
                                <td class="text-center">
                                    <a href="<?php echo base_url('employees/salary/edit_salary/'.$salary['employee_id']); ?>" title="Edit Salary"><i class="fa fa-edit fa-2x" ></i></a>
                                    <a href="<?php echo base_url('employees/salary/timeline/'.$salary['employee_id']); ?>" title="Salary Timeline"><i class="fa fa-history fa-2x"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="text-center">EMP_ID</th>
                            <th class="text-center">EMPLOYEE NAME</th>
                            <th class="text-center">DESIGNATION</th>
                            <th class="text-center">BASIC SALARY</th>
                            <th class="text-center">HOUSE ALLOWANCE</th>
                            <th class="text-center">TRAVELLING ALLOWANCE</th>
                            <th class="text-center">OTHER ALLOWANCE</th>
                            <th class="text-center">SALARY</th>
                            <th class="text-center" width="12%">ACTIONS</th>
                        </tr>
                    </tfoot>
                 </table>
              </div>
          </div>
       </div>
    </div>
</div>

<?php include_once( APPPATH.'views/includes/footer.php' ); ?>