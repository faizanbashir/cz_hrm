<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<link href="<?php echo base_url(); ?>assets/js/plugins/timepicker/jquery.datetimepicker.css" rel="stylesheet">

<div class="row wrapper border-bottom white-bg page-heading push-bottom">
    <div class="col-lg-12">
        <h2>
            <i class="<?php echo $icon; ?>"></i> <?php echo $title; ?>
            <a href="<?php echo base_url('employees/assets/issue_asset'); ?>" class="btn btn-success btn-xs pull-right"><i class="fa fa-plus"></i> ISSUE ASSET</a>
            
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
            <a href="<?php echo base_url('employees/designations'); ?>" class="btn btn-white m-b dim">Designations</a>
            <a href="<?php echo base_url('employees/assets'); ?>" class="btn btn-danger m-b dim">Assets</a>
        </div>       
    </div>
    <div class="row">
        <div class="col-lg-12 animated fadeInRight">    
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>View Assets <small> Here you can manage Assets issued to Employees.</small></h5>
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
                                <th>EMPLOYEE NAME</th>
                                <th>DESIGNATION</th>
                                <th>ISSUED ASSET</th>
                                <th>DESCRIPTION</th>
                                <th>ISSUED ON</th>
                                <th>RETURNED ON</th>
                                <th>STATUS</th>
                                <th class="text-center" width="12%">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($assets as $asset): ?>
                                <tr class="gradeA">
                                    <td><?php echo $asset['first_name'].' '.$asset['last_name']; ?></td>
                                    <td><?php echo $asset['designation']; ?></td>
                                    <td><?php echo $asset['asset_name']; ?></td>                                 
                                    <td class="center"><?php echo $asset['description']; ?></td>
                                    <td class="center"><?php echo date('jS M, Y', strtotime($asset['issued_on'])); ?></td>
                                    <td class="center"><?php if($asset['returned_on'])echo date('jS M, Y', strtotime($asset['returned_on'])); else echo "Not Returned"; ?></td>
                                    <td><span class="btn btn-success btn-xs"><small><b><?php echo strtoupper($asset['status']); ?></b></small></span></td>
                                    <td class="text-center">
                                    <?php if($asset['returned_on']==NULL):?>
                                    <a href="" data-toggle="modal" data-target="#return-asset" title="Return Issued Asset"><i class="fa fa-reply fa-2x"></i></a>
                                    <a href="<?php echo base_url('employees/assets/edit/'.$asset['id']); ?>" title="Edit Issued Asset"><i class="fa fa-edit fa-2x"></i></a>
                                    <?php endif; ?>
                                    <a href="<?php echo base_url('employees/assets/delete/'.$asset['id']); ?>" title="Delete Issued Asset" onclick="return confirm('ARE YOU SURE YOU WANT TO DELETE THE ASSET?')"><i class="fa fa-trash fa-2x red"></i></a>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>EMPLOYEE NAME</th>
                                <th>DESIGNATION</th>
                                <th>ISSUED ASSET</th>
                                <th>DESCRIPTION</th>
                                <th>ISSUED ON</th>
                                <th>RETURNED ON</th>
                                <th>STATUS</th>
                                <th class="text-center" width="12%">ACTIONS</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal inmodal" id="return-asset" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">RETURN ASSET</h4>
                <small class="font-bold">Here you can return issued asset.</small>
            </div>
            <form action="<?php echo base_url('employees/assets/return_asset/'.$asset['id']); ?>" class="form-horizontal" method="post">
                <div class="modal-body">                
                    <div id="status"></div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Returned-on</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" name="returned_on" id="datetimepicker" required/>
                        </div>
                    </div>
                </div> 

                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary m-b pull-right dim" value="RETURN" id="submit">            
                </div>
            </form>
        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>assets/js/plugins/timepicker/jquery.datetimepicker.full.js"></script>

<script type="text/javascript">
    $('#datetimepicker').datetimepicker({
        timepicker:false
    });
</script>

<?php include_once( APPPATH.'views/includes/footer.php' ); ?>