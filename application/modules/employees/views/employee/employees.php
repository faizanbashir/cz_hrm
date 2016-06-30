<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<div class="row wrapper border-bottom white-bg page-heading push-bottom">
    <div class="col-lg-12">
        <h2>
            <i class="<?php echo $icon; ?>"></i> <?php echo $title; ?>
            <a href="<?php echo base_url('employees/employee/add_employee'); ?>" class="btn btn-success btn-xs pull-right"><i class="fa fa-plus"></i> ADD EMPLOYEE</a>
        </h2>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('employees/hr'); ?>">Home</a></li>
            <li><a href="<?php echo base_url('employees/employee'); ?>">Employees</a></li>
            <li class="active"><strong><?php echo $title; ?></strong></li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-md-12"> 
            <a href="<?php echo base_url('employees/employee'); ?>" class="btn btn-danger m-b dim">Employees</a>
            <a href="<?php echo base_url('employees/designations'); ?>" class="btn btn-white m-b dim">Designations</a>
            <a href="<?php echo base_url('employees/assets'); ?>" class="btn btn-white m-b dim">Assets</a>
        </div>       
    </div>
    <div class="row">
        <div class="col-lg-12 animated fadeInRight">    
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>View Employees <small> Here you can manage employees.</small></h5>
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
                                <th>NAME</th>
                                <th>DESIGNATION</th>
                                <th>EMAIL</th>
                                <th>MOBILE NO</th>
                                <th>ADDRESS</th>
                                <th class="text-center" width="12%">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($employees as $employee): ?>
                                <tr class="gradeA">
                                    <td><?php echo $employee['first_name'].' '.$employee['last_name']; ?></td>
                                    <td><?php echo $employee['designation']; ?></td>
                                    <td><?php echo $employee['email']; ?></td>                                 
                                    <td class="center"><?php echo $employee['mobile_no']; ?></td>
                                    <td class="center"><?php echo $employee['address'].', '.$employee['city'].', '.$employee['state'].', '.$employee['country']; ?></td>
                                    <td class="text-center">
                                        <a href="<?php echo base_url('user/calendar/attendance_calendar/'.$employee['id']); ?>"><i class="fa fa-calendar fa-2x"></i></a>
                                        <a href="<?php echo base_url('employees/employee/edit_employee/'.$employee['id']); ?>"><i class="fa fa-edit fa-2x"></i></a>
                                        <a href="<?php echo base_url('employees/employee/delete_employee/'.$employee['id']); ?>" title="Delete Employee" onclick="return confirm('ARE YOU SURE YOU WANT TO DELETE THE EMPLOYEE?')"><i class="fa fa-trash red fa-2x"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>NAME</th>
                                <th>DESIGNATION</th>
                                <th>EMAIL</th>
                                <th>MOBILE NO</th>
                                <th>ADDRESS</th>
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