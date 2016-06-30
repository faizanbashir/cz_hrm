<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-md-9">
        <h2><i class="<?php echo $icon; ?>"></i> <?php echo $title; ?>
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
        <div class="col-md-12 animated fadeInRight">    
            <div class="ibox float-e-margins">
               
                <div class="ibox-title">
                    <h5><?php echo $title; ?> <small> <?php if(isset($designation['id'])) echo "Here you can edit employee designation."; else echo "Here you can add employee designation"; ?> </small></h5>
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
                    
                    <form action="<?php if(isset($designation['id'])) echo base_url('employees/designations/edit/'.$designation['id']); else echo base_url('employees/designations/add'); ?>" class="form-horizontal" role="form" method="post">                        

                        <div class="form-group">
                            <label class="col-md-4 control-label">Designation Title </label>
                            <div class="col-md-6">
                                <input class="form-control " type="text" name= "designation_title" value="<?php if(isset($designation['id'])) echo $designation['designation_title']; ?>" >
                            </div>
                        </div>                     
                
                        <div class="form-group">
                            <label class="col-md-4 control-label">Designation Description </label> 
                            <div class="col-md-6">
                                <textarea class="form-control" type="text" name="designation_description" id="description" rows="5"><?php if(isset($designation['id'])) echo $designation['designation_description']; ?></textarea>
                            </div>
                        </div>
                              
                        <div class="form-group">
                            <div class="col-md-10">
                                <input type="submit" class="btn btn-primary m-b pull-right dim" value="<?php if(isset($designation['id'])) echo "UPDATE"; else echo "ADD"; ?> DESIGNATION" id="submit">
                            </div>
                        </div>

                  </form>
            </div>
        </div>
    </div>
</div>

<?php include_once( APPPATH.'views/includes/footer.php' ); ?>