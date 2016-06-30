<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<div class="row wrapper border-bottom white-bg page-heading push-bottom">
    <div class="col-lg-11">
        <h2>
            <i class="<?php echo $icon; ?>"></i> <?php echo $title; ?>
        </h2>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('employees/hr'); ?>">Home</a></li>
            <li class="active"><strong><?php echo $title; ?></strong></li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12 animated fadeInRight">    
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>BMS+ Roles Description</h5>
                     <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                     </div>
                </div>
                <form action="<?php echo base_url('employees/roles/update'); ?>" method="post">
                    <div class="ibox-content">
                        <?php echo $this->session->flashdata('notification');?>
                        <table class="table table-striped table-bordered table-hover" >
                            <thead>
                                <tr>
                                    <th class="text-center" width="6%">S NO</th>
                                    <th>ROLE DESCRIPTION</th>
                                    <th width="34%">ASSIGN TO DESIGNATIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $count = 1; 
                                    foreach($roles as $role): 
                                        $ext_designations   =   explode(',', $role['employee_designations']);
                                ?> 
                                <tr class="gradeB">
                                    <td class="text-center"><?php echo $count++; ?></td>
                                    <td><?php echo $role['role_description']; ?></td>
                                    <td>
                                        <select data-placeholder="Select Designations..." class="chosen-select col-lg-12" id="employee_designations_<?php echo $role['id']; ?>" name="employee_designations[<?php echo $role['id']; ?>][]" multiple>
                                            <option value=""></option>
                                            <?php foreach($designations as $designation): ?>
                                                <option value="<?php echo $designation['id']; ?>" <?php if(in_array($designation['id'], $ext_designations)) echo 'selected'; ?>><?php echo $designation['designation_title']; ?></option>  
                                            <?php endforeach; ?>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                            <?php endforeach; ?>                            
                        </table>
                        <button type="submit" class="btn btn-sm btn-primary pull-right m-t-n-xs">UPDATE ROLES</button>
                        <br>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once( APPPATH.'views/includes/footer.php' ); ?>