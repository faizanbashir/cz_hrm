<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<div class="row wrapper border-bottom white-bg page-heading push-bottom">
    <div class="col-lg-12">
        <h2><i class="<?php echo $icon; ?>"></i> <?php echo $title; ?>
            <a href="<?php echo base_url('employees/leaves/add'); ?>" class="btn btn-success btn-xs pull-right"><i class="fa fa-plus"></i> ADD LEAVE</a>
        </h2>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('employees/hr'); ?>">Home</a></li>
            <li><a href="<?php echo base_url('employees/leaves'); ?>">Leaves</a></li>
            <li class="active"><strong><?php echo $title; ?></strong></li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-md-12"> 
            <a href="<?php echo base_url('employees/leaves/'); ?>" class="btn btn-danger m-b dim">Company Leaves</a>
            <a href="<?php echo base_url('employees/leaves/employee_leaves'); ?>" class="btn btn-white m-b dim">Employee Leaves</a>
        </div>       
    </div>
    <div class="row">
        <div class="col-lg-12 animated fadeInRight">    
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Employees Leaves<small> Here you can manage employee yearly leaves.</small></h5>
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
                                <th class="text-center" >SNO</th>
                                <th>LEAVE DESCRIPTION</th>
                                <th class="text-center" >YEARLY</th>
                                <th class="text-center" width="12%">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $count = 1; 
                                foreach($leaves as $leave): 
                            ?> 
                            <tr class="gradeX">
                                <td class="text-center"><?php echo $count++;?></td>
                                <td><b><?php echo $leave['leave_name']; ?></b> <?php echo $leave['leave_description']; ?></td>            
                                <td class="text-center required"><?php echo $leave['yearly_leaves']; ?> 
                                </td>
                                <td class="text-center">
                                    <a href="<?php echo base_url('employees/leaves/edit/'.$leave['id']); ?>"><i class="fa fa-edit fa-2x"></i></a>
                                    <a href="<?php echo base_url() . "employees/leaves/delete/" . $leave['id']?>" title="Delete Leave" onclick="return confirm('ARE YOU SURE YOU WANT TO DELETE THE LEAVE?')"><i class="fa fa-trash red fa-2x"></i></a>
                                </td>
                            </tr>
                         <?php endforeach; ?>
                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="text-center">SNO</th>
                                <th>LEAVE DESCRIPTION</th>
                                <th class="text-center">YEARLY</th>
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