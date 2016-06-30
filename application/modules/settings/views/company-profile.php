<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<link href="<?php echo base_url(); ?>assets/js/plugins/timepicker/jquery.datetimepicker.css" rel="stylesheet">

<div class="row wrapper border-bottom white-bg page-heading push-bottom">
    <div class="col-lg-9">
        <h2><i class="<?php echo $icon; ?>"></i> <?php echo $title; ?></h2>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>">Home</a></li>
            <li>Settings</li>
            <li class="active"><strong>Personal Profile</strong></li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-4 animated fadeInRight">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>PROFILE DETAIL</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div>                        
                        <center>
                            <div class="ibox-content no-padding border-left-right">
                                <br>
                                <div style="width:95%"><?php echo $this->session->flashdata('notification');?></div> 
                                <img alt="image" class="img-responsive" src="http://insights.website/insight-sign/images/insights-logo.png">
                            </div>
                        </center>
                        <form id="company_logo" class="form-horizontal" role="form" action="<?php echo base_url('settings/user/update_company_logo/'.$company['id']); ?>" method="POST" enctype="multipart/form-data">                            
                            <div class="ibox-content profile-content">
                                <center>
                                    <div class="btn-group">
                                        <label title="Upload Logo" for="inputImage" class="btn btn-primary">
                                            <input onchange="submit_form();" type="file" accept="image/*" name="logo" id="inputImage" class="hide" required>
                                            Upload new Logo
                                        </label>
                                    </div>
                                </center>
                                <h4><strong><?php echo $company['company_name']; ?></strong></h4>
                                <p><i class="fa fa-map-marker"></i> <?php echo $company['tag_line']; ?></p>
                                <h5>
                                    About Company
                                </h5>
                                <p>
                                    <?php echo $company['about_company']; ?>
                                </p>
                                <div class="row m-t-lg">
                                    <div class="col-md-4">
                                        <span class="bar">5,3,9,6,5,9,7,3,5,2</span>
                                        <h5><strong><?php //echo count($this->Lead_Model->get_leads()); ?></strong> <br> Leads</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <span class="line">5,3,9,6,5,9,7,3,5,2</span>
                                        <h5><strong><?php //echo count($this->Lead_Model->get_active_leads()); ?></strong> <br> Active</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <span class="bar">5,3,2,-1,-3,-2,2,3,5,2</span>
                                        <h5><strong><?php //echo count($this->Lead_Model->get_converted_leads()); ?></strong> <br> Converted</h5>
                                    </div>
                                </div>
                               
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8 animated fadeInRight">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>BASIC INFORMATION</h5>
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

                        <?php echo $this->session->flashdata('profile_notification');?> 

                        <form onsubmit="return checkMatchPass();" action="<?php echo base_url('settings/user/update_company_details/'.$company['id']);?>" class="form-horizontal" role="form" method="post">
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Company Name </label>
                                <div class="col-lg-8">
                                    <input class="form-control only-alphabets" type="text" name="company_name" value="<?php if(isset($company['id'])) echo $company['company_name']; ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Tag Line </label>
                                <div class="col-lg-8">
                                    <input class="form-control" type="text" name="tag_line" value="<?php if(isset($company['id'])) echo $company['tag_line']; ?>" required>
                                </div>
                            </div>     
                            <div class="form-group">
                                <label class="col-lg-3 control-label">About Company </label>
                                <div class="col-lg-8">
                                    <textarea class="form-control" rows="3" name="about_company"><?php if(isset($company['id'])) echo $company['about_company']; ?></textarea>
                                </div>
                            </div>      
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Website URL </label>
                                <div class="col-lg-8">
                                    <input class="form-control" type="text" name="website_url" value="<?php if(isset($company['id'])) echo $company['website_url']; ?>">
                                </div>
                            </div>                            
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Email ID </label>
                                <div class="col-lg-8">
                                    <input class="form-control" type="text" name="email" value="<?php if(isset($company['id'])) echo $company['email']; ?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Contact No </label>
                                <div class="col-lg-8">
                                    <input class="form-control only-numbers" type="text" name= "contact_no" value="<?php if(isset($company['id'])) echo $company['contact_no']; ?>"required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Fax No </label>
                                <div class="col-lg-8">
                                    <input class="form-control only-numbers" type="text" name="fax_no" value="<?php if(isset($company['id'])) echo $company['fax_no']; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Country </label>
                                <div class="col-lg-8">
                                    <select class="chosen-select col-lg-12" id="country" name="country" required="">                         
                                    </select>
                                </div>
                            </div>  
                            <div class="form-group">
                                <label class="col-lg-3 control-label">State </label>
                                <div class="col-lg-8">
                                    <select class="chosen-select col-lg-12" id="state" name="state" required="">
                                        <option>Select State</option>
                                    </select>
                                </div>
                            </div>   
                            <div class="form-group">
                                <label class="col-lg-3 control-label">City </label>
                                <div class="col-lg-8">
                                    <input class="form-control" type="text" name="city" value="<?php if(isset($company['id'])) echo $company['city']; ?>" required>
                                </div>
                            </div>                                  
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Address </label>
                                <div class="col-lg-8">
                                    <textarea class="form-control" rows="3" name="address"><?php if(isset($company['id'])) echo $company['address']; ?></textarea>
                                </div>
                            </div>

                           <div class="form-group">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-8">
                                    <input type="submit" class="btn btn-primary m-b pull-right dim" value="UPDATE PROFILE" id="submit">
                                    <span></span>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div> 
    </div>  
       
</div>

<script type="text/javascript" src="<?php echo base_url().'assets/js/countries.js'; ?>"></script>

<script language="javascript">
    populateCountries("country", "state");
    populateCountries("country2");    
</script>

<?php if(isset($company['country']) && isset($company['state'])): ?>
    <script>
        $("#country").val('<?php echo $company['country'];?>');
        $("#country").change();
        $("#state").val('<?php echo $company['state'];?>');
    </script>  
<?php endif; ?>

<!-- Peity -->
<script src="<?php echo base_url(); ?>assets/js/plugins/peity/jquery.peity.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/demo/peity-demo.js"></script>

<script type="text/javascript">
    function submit_form()
    {
        $('#company_logo').submit();
        return true;
    }
</script>

<?php include_once( APPPATH.'views/includes/footer.php' ); ?>