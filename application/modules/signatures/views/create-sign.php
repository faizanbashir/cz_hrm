<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<div class="row wrapper border-bottom white-bg page-heading push-bottom">
    <div class="col-lg-9">
        <h2><i class="<?php echo $icon; ?>"></i> <?php echo $title; ?></h2>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>">Home</a></li>
            <li><a href="<?php echo base_url('signatures/signatures'); ?>">Signatures</a></li>
            <li class="active"><strong><?php echo $title; ?></strong></li>
        </ol>
    </div>
</div>

<div class="gallery-light">
    <div class="row">
        <div class="col-lg-12" style="text-align: center;">
            <img src="http://insights.website/insight-sign/images/insights-logo.png"/>
            <h1>Signature Creator!</h1>
        </div>
    </div>
  
    <form  action="<?php if(isset($employee['id'])) echo base_url('signatures/signatures/edit_custom_signature/'.$employee['id']); else echo base_url('signatures/signatures/create_custom_signature');  ?>" class="form-horizontal" role="form" name="main" method="post">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-4 control-label">Name of Employee</label> 
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="name" placeholder="Employee Full Name" value="<?php if(isset($employee['id'])) echo $employee['name']; ?>" required/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Designation of Employee</label> 
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="designation" placeholder="Designation of Employee"  value="<?php if(isset($employee['id'])) echo $employee['designation']; ?>" required/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Email of Employee</label>
                    <div class="col-md-5"> 
                        <input type="email" class="form-control" name="email" placeholder="Email of Employee"  value="<?php if(isset($employee['id'])) echo $employee['email']; ?>" required/>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-5 control-label">Company Landline Number</label> 
                    <div class="col-md-5">
                        <input type="tel" class="form-control" name="contact" placeholder="+971(4)1234567"  value="<?php if(isset($employee['id'])) echo $employee['contact']; ?>" required/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-5 control-label">Employee Mobile Number</label> 
                    <div class="col-md-5">
                        <input type="tel" class="form-control" name="mobile" placeholder="+971(55)1234567"  value="<?php if(isset($employee['id'])) echo $employee['mobile']; ?>" required/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-10">
                        <input type="submit" class="btn btn-primary m-b pull-right dim" value="<?php if(isset($employee['id'])) echo "SAVE CHANGES"; else echo "CREATE"; ?>" id="submit">
                    </div>
                </div>
                
            </div>
        </div>
    </form>
   
</div>


<?php include_once( APPPATH.'views/includes/footer.php' ); ?>