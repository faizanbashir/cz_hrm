<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<div class="row wrapper border-bottom white-bg page-heading push-bottom">
    <div class="col-lg-12">
        <h2>
            <i class="<?php echo $icon; ?>"></i> <?php echo $title; ?>
            <a href="<?php echo base_url('employees/designations/add'); ?>" class="btn btn-success btn-xs pull-right"><i class="fa fa-plus"></i> ADD DESIGNATION</a>
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
            <a href="<?php echo base_url('employees/employee'); ?>" class="btn btn-white m-b dim">Employees</a>
            <a href="<?php echo base_url('employees/designations'); ?>" class="btn btn-danger m-b dim">Designations</a>
            <a href="<?php echo base_url('employees/assets'); ?>" class="btn btn-white m-b dim">Assets</a>
        </div>       
    </div>
    <div class="row">
        <div class="col-lg-12 animated fadeInRight">    
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?php echo $title; ?> <small> Here you can manage Employees Designations.</small></h5>
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
                                <th width="20%;">DESIGNATION TITLE</th>
                                <th>DESIGNATION DESCRIPTION</th>
                                <th class="text-center" width="12%">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($designations as $designation): ?>
                                <tr class="gradeA">
                                    <td><?php echo $designation['designation_title']; ?></td>
                                    <td><?php echo $designation['designation_description']; ?></td>

                                    <td class="text-center">
                                        <a href="<?php echo base_url('employees/designations/edit/'.$designation['id']); ?>" title="Edit Employee Designation"><i class="fa fa-edit fa-2x"></i></a>
                                        <a href="<?php echo base_url('employees/designations/delete/'.$designation['id']); ?>" title="Delete Employee Designation" onclick="return confirm('ARE YOU SURE YOU WANT TO DELETE THE EMPLOYEE DESIGNATION?')"><i class="fa fa-trash fa-2x red"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>DESIGNATION TITLE</th>
                                <th>DESIGNATION DESCRIPTION</th>
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