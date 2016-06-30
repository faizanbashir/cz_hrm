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
           <a href="<?php echo base_url('employees/leaves/'); ?>" class="btn btn-white m-b dim">Company Leaves</a>
            <a href="<?php echo base_url('employees/leaves/employee_leaves'); ?>" class="btn btn-danger m-b dim">Employee Leaves</a>
        </div>       
    </div>
    <div class="row">
        <div class="col-lg-12 animated fadeInRight">    
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Leaves Requested <small> Here you can view Requested Leaves.</small></h5>
                    
                    <!-- <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div> -->

                    <div class="ibox-tools ">                        
                        <a style="margin-top:-14%!important;" href="<?php echo base_url('employees/leaves/employee_leaves'); ?>" class="btn btn-primary">RESET</a>
                    </div>

                    <div class="ibox-tools">                        
                        <select class="form-control" style="margin-top:-4%;" name="employee" id="employee" onchange="manage()" >
                            <option value="all" <?php if($this->uri->segment(3) == 'all') echo 'selected'; ?>>Filter by Employee</option>
                            <?php foreach($employees as $employee): ?>
                                <option value="<?php echo $employee['id']; ?>" <?php if($this->uri->segment(3) == $employee['id']) echo 'selected'; ?>><?php echo $employee['first_name'].' '.$employee['last_name'].' ('.$employee['designation'].')'; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                </div>
                
                <div class="ibox-content">
                    <?php echo $this->session->flashdata('notification');?> 
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                            <tr>
                                <th class="text-center">EMP ID</th>
                                <th>EMPLOYEE NAME</th>
                                <th>LEAVE TYPE</th>
                                <!-- <th class="text-center">SUBJECT</th>
                                <th class="text-center">DESCRIPTON</th> -->
                                <th class="text-center">FROM-TO</th>
                                <th class="text-center">STATUS</th>                   
                                <th class="text-center" width="15%">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($employee_leaves as $emp): ?>
                                <tr class="gradeX">
                                    <td class="text-center"><?php echo $emp['employee_id']; ?></td>
                                    <td><?php echo $emp['first_name'].' '.$emp['last_name'].'<br>['.$emp['designation'].']'; ?></td>
                                    <td><?php echo $emp['leave_name']; ?></td>
                                    <!-- <td><?php echo $emp['subject']; ?></td>
                                    <td><?php echo $emp['leave_description']; ?></td> -->
                                    <td class="text-center"><?php echo $emp['leave_from'].' <b>TO</b> '.$emp['leave_to']; ?></td>
                                    <td class="text-center"><span class="btn btn-success btn-xs"><small><b><?php echo strtoupper($emp['status']); ?></b></small></span></td>
                                    <td class="text-center">
                                        <?php if($emp['status'] == 'active'): ?>
                                            <a href="<?php echo base_url('employees/leaves/edit_leave/'.$emp['id']); ?>" title="Edit Requested Leave"><i class="fa fa-edit fa-2x"></i></a>
                                            <a href="<?php echo base_url('employees/leaves/approve/'.$emp['id']); ?>" title="Approve Requested Leave" onclick="return confirm('ARE YOU SURE YOU WANT TO APPROVE LEAVE REQUEST?')"><i class="fa fa-thumbs-o-up fa-2x"></i></a>
                                            <a href="<?php echo base_url('employees/leaves/reject/'.$emp['id']); ?>" title="Reject Requested Leave" onclick="return confirm('ARE YOU SURE YOU WANT TO REJECT LEAVE REQUEST?')"><i class="fa fa-thumbs-o-down fa-2x"></i></a>                
                                        <?php endif; ?>
                                            <a href="<?php echo base_url('employees/leaves/delete_leave/'.$emp['id']); ?>" title="Delete Requested Leave" onclick="return confirm('ARE YOU SURE YOU WANT TO DELETE THE LEAVE REQUEST?')"><i class="fa fa-trash fa-2x red"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="text-center">EMP ID</th>
                                <th>EMPLOYEE NAME</th>
                                <th>LEAVE TYPE</th>
                                <!-- <th class="text-center">SUBJECT</th>
                                <th class="text-center">DESCRIPTON</th> -->
                                <th class="text-center">FROM-TO</th>
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

<script type="text/javascript">
    function manage()
    {   
        var emp = $('#employee').val();
        window.location.href="<?php echo base_url(); ?>employees/leaves/employee_leaves/"+ emp;
    }
</script>

<?php if($this->uri->segment(4)): ?>
    <script type="text/javascript">
        $('#employee').val(<?php echo $this->uri->segment(4); ?>);
    </script>
<?php endif; ?>

<?php include_once( APPPATH.'views/includes/footer.php' ); ?>