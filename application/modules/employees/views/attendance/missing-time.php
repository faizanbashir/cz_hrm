<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<div class="row wrapper border-bottom white-bg page-heading push-bottom">
    <div class="col-lg-12">
        <h2><i class="<?php echo $icon; ?>"></i> <?php echo $title; ?></h2>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('employees/hr'); ?>">Home</a></li>
            <li>Leaves</li>
            <li class="active"><strong><?php echo $title; ?></strong></li>   
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-md-12"> 
            <a href="<?php echo base_url('employees/attendance/'); ?>" class="btn btn-white m-b dim">Attendance</a>
            <a href="<?php echo base_url('employees/attendance/extra_hours'); ?>" class="btn btn-white m-b dim">Extra Hours</a>
            <a href="<?php echo base_url('employees/attendance/off_days'); ?>" class="btn btn-white m-b dim">Off-Days</a>
            <a href="<?php echo base_url('employees/attendance/missing_time'); ?>" class="btn btn-danger m-b dim">Missed TIME-IN/TIME-OUT</a>
        </div>       
    </div>
    <div class="row">
        <div class="col-lg-12 animated fadeInRight">    
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Missing Time-In/Time-Out <small> Here you can view Missing Time-In/Time-Out.</small></h5>
                    
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
                                <th width="8%">EMP ID</th>
                                <th>EMPLOYEE NAME</th>
                                <th>DESIGNATION</th>
                                <th>DATE</th>
                                <th class="text-center">MISSED</th>
                                <th class="text-center">STATUS</th>                   
                                <th class="text-center" width="15%">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($time as $time): ?>
                                <tr class="gradeX">
                                    <td><?php echo $time['employee_id']; ?></td>
                                    <td><?php echo $time['first_name'].' '.$time['last_name']; ?></td>
                                    <td><?php echo $time['designation'];?></td>
                                    <td><?php echo date('jS M, Y', strtotime($time['date'])); ?></td>
                                    <td class="text-center"><?php echo strtoupper($time['missed']); ?></td>
                                    <td class="text-center"><span class="btn btn-success btn-xs"><small><b><?php echo strtoupper($time['status']); ?></b></small></span></td>
                                    <td class="text-center">
                                        <?php if($time['status'] == 'active'): ?>
                                        <a href="<?php echo base_url('employees/attendance/edit_missing_time/'.$time['id']); ?>" title="Edit Requested Missing Time"><i class="fa fa-edit fa-2x"></i></a>
                                        <a href="<?php echo base_url('employees/attendance/approve_missing_time/'.$time['id']); ?>" title="Approve Requested Missing Time" onclick="return confirm('ARE YOU SURE YOU WANT TO APPROVE MISSING TIME REQUEST?')"><i class="fa fa-thumbs-o-up fa-2x"></i></a>
                                        <a href="<?php echo base_url('employees/attendance/reject_missing_time/'.$time['id']); ?>" title="Reject Requested Missing Time" onclick="return confirm('ARE YOU SURE YOU WANT TO REJECT MISSING TIME REQUEST?')"><i class="fa fa-thumbs-o-down fa-2x"></i></a>                
                                        <?php endif; ?>
                                        <a href="<?php echo base_url('employees/attendance/delete_missing_time/'.$time['id']); ?>" title="Delete Requested Missing Time" onclick="return confirm('ARE YOU SURE YOU WANT TO DELETE THE MISSING TIME REQUEST?')"><i class="fa fa-trash fa-2x red"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th width="8%">EMP ID</th>
                                <th>EMPLOYEE NAME</th>
                                <th>DESIGNATION</th>
                                <th>DATE</th>
                                <th class="text-center">MISSED</th>
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