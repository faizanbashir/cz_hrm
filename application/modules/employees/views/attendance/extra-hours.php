<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<div class="row wrapper border-bottom white-bg page-heading push-bottom">
    <div class="col-lg-12">
        <h2><i class="<?php echo $icon; ?>"></i> <?php echo $title; ?>
        </h2>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('employees/hr'); ?>">Home</a></li>
            <li>Attendance</li>
            <li class="active"><strong><?php echo $title; ?></strong></li>   
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-md-12"> 
            <a href="<?php echo base_url('employees/attendance/'); ?>" class="btn btn-white m-b dim">Attendance</a>
            <a href="<?php echo base_url('employees/attendance/extra_hours'); ?>" class="btn btn-danger m-b dim">Extra Hours</a>
            <a href="<?php echo base_url('employees/attendance/off_days'); ?>" class="btn btn-white m-b dim">Off-Days</a>
            <a href="<?php echo base_url('employees/attendance/missing_time'); ?>" class="btn btn-white m-b dim">Missed TIME-IN/TIME-OUT</a>
        </div>       
    </div>
    <div class="row">
        <div class="col-lg-12 animated fadeInRight">    
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Extra Hours <small> Here you can view Extra Hours.</small></h5>
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
                                <th class="text-center">EMP ID</th>
                                <th>EMPLOYEE NAME</th>
                                <th>DESIGNATION</th>
                                <th>DATE</th>
                                <th class="text-center">HOURS</th>
                                <th class="text-center">STATUS</th>                   
                                <th class="text-center" width="15%">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($extra as $row): ?>
                                <tr class="gradeX">
                                    <td class="text-center"><?php echo $row['employee_id']; ?></td>
                                    <td><?php echo $row['first_name'].' '.$row['last_name']; ?></td>
                                    <td><?php echo $row['designation'];?></td>
                                    <td><?php echo date('jS M, Y', strtotime($row['date'])); ?></td>
                                    <td class="text-center"><?php echo $row['hours']; ?></td>
                                    <td class="text-center"><span class="btn btn-success btn-xs"><small><b><?php echo strtoupper($row['status']); ?></b></small></span></td>
                                    <td class="text-center">
                                        <?php if($row['status'] == 'active'): ?>
                                        <a href="<?php echo base_url('employees/attendance/edit_extra_hours/'.$row['id']); ?>" title="Edit Requested Extra Hours"><i class="fa fa-edit fa-2x"></i></a>
                                        <a href="<?php echo base_url('employees/attendance/approve_extra_hours/'.$row['id']); ?>" title="Approve Requested Extra Hours" onclick="return confirm('ARE YOU SURE YOU WANT TO APPROVE EXTRA HOURS REQUEST?')"><i class="fa fa-thumbs-o-up fa-2x"></i></a>
                                        <a href="<?php echo base_url('employees/attendance/reject_extra_hours/'.$row['id']); ?>" title="Reject Requested Extra Hours" onclick="return confirm('ARE YOU SURE YOU WANT TO REJECT EXTRA HOURS REQUEST?')"><i class="fa fa-thumbs-o-down fa-2x"></i></a>
                                        <?php endif; ?> 
                                        <a href="<?php echo base_url('employees/attendance/delete_extra_hours/'.$row['id']); ?>" title="Delete Requested Extra Hours" onclick="return confirm('ARE YOU SURE YOU WANT TO DELETE THE EXTRA HOURS REQUEST?')"><i class="fa fa-trash fa-2x red"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="text-center">EMP ID</th>
                                <th>EMPLOYEE NAME</th>
                                <th>DESIGNATION</th>
                                <th>DATE</th>
                                <th class="text-center">HOURS</th>
                                <th class="text-center">STATUS</th>                   
                                <th class="text-center" width="15%">ACTIONS</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once( APPPATH.'views/includes/footer.php' ); ?>