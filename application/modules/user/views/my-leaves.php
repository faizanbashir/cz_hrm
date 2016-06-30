<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<div class="row wrapper border-bottom white-bg page-heading push-bottom">
    <div class="col-lg-12">
        <h2><i class="<?php echo $icon; ?>"></i> <?php echo $title; ?>
            <a href="<?php echo base_url('user/personal/request_leave'); ?>" class="btn btn-success btn-xs pull-right"><i class="fa fa-plus"></i> REQUEST LEAVE</a>
        </h2>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>">Home</a></li>
            <li>Personal</li>
            <li class="active"><strong><?php echo $title; ?></strong></li>   
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content">
     <div class="row">
        <div class="col-lg-12 animated fadeInRight">    
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Leaves Requested <small> Here you can view Requested Leaves.</small></h5>          
                </div>
                
                <div class="ibox-content">
                    <?php echo $this->session->flashdata('notification');?> 
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                            <tr>
                                <th width="15%">LEAVE TYPE</th>
                                <th>SUBJECT</th>
                                <th>DESCRIPTON</th>
                                <th class="text-center" width="12%">FROM-TO/DAY</th>
                                <th class="text-center">STATUS</th>    
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($employee_leaves as $emp): ?>
                                <tr class="gradeX">
                                    <td><?php echo $emp['leave_name']; ?></td>
                                    <td><?php echo $emp['subject']; ?></td>
                                    <td><?php echo $emp['leave_description']; ?></td>
                                    <td class="text-center"><?php if($emp['leave_name']=='Half Day') echo $emp['day']; else echo $emp['leave_from'].' <b>TO</b> '.$emp['leave_to']; ?></td>
                                    <td class="text-center"><span class="btn btn-success btn-xs"><small><b><?php echo strtoupper($emp['status']); ?></b></small></span></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th width="15%">LEAVE TYPE</th>
                                <th>SUBJECT</th>
                                <th>DESCRIPTON</th>
                                <th class="text-center">FROM-TO/DAY</th>
                                <th class="text-center">STATUS</th>  
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