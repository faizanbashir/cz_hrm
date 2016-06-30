<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<link href="<?php echo base_url(); ?>assets/js/plugins/timepicker/jquery.datetimepicker.css" rel="stylesheet">

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-md-9">
        <h2><i class="<?php echo $icon; ?>"></i> <?php echo $title; ?>
        </h2>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('employees/hr'); ?>">Home</a></li>
            <li><a href="<?php echo base_url('employees/travel_plans'); ?>">Travel Plans</a></li>
            <li class="active"><strong><?php echo $title; ?></strong></li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-md-12 animated fadeInRight">    
            <div class="ibox float-e-margins">
               
                <div class="ibox-title">
                    <h5>Travel Project Details <small> Here you can add a travel project details. </small></h5>
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
                    
                    <form action="<?php echo (isset($travel_plan['id']) ? base_url()."employees/travel_plans/edit/".$travel_plan['id'] : base_url('employees/travel_plans/add'));?>" class="form-horizontal" role="form" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-6">  
                                    
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Travel Purpose: </label> 
                                        <div class="col-md-8">
                                            <textarea class="form-control" type="text" name="travel_purpose" id="travel_purpose" rows="6"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Employees: </label> 
                                        <div class="col-md-8">
                                            <select data-placeholder="Select Employees..." class="chosen-select col-lg-12" multiple tabindex="4" name="employees[]" id="employees" required>
                                                <option value=""></option>
                                                <?php foreach($employees as $employee): ?>
                                                    <option value="<?php echo $employee['id']; ?>" ><?php echo $employee['first_name'].' '.$employee['last_name'].' ('.$employee['designation'].')'; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Project Manager: </label>
                                        <div class="col-md-8">
                                            <select data-placeholder="Select Project Manager..." class="chosen-select col-lg-12" name="project_manager" id="project_manager" required>
                                                <option value=""></option>
                                                <?php 
                                                    foreach($employees as $employee): 
                                                        if($employee['designation'] !== 'Project Manager')
                                                            continue;
                                                ?>
                                                    <option value="<?php echo $employee['id']; ?>"><?php echo $employee['first_name'].' '.$employee['last_name'].' ('.$employee['designation'].')'; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Alternate Support: </label>
                                        <div class="col-md-8">
                                            <select data-placeholder="Select Alternate Support (optional)..." class="chosen-select col-lg-12" name="alternate_support" id="alternate_support">
                                                <option value=""></option>
                                                <?php foreach($employees as $employee): ?>
                                                    <option value="<?php echo $employee['id']; ?>"><?php echo $employee['first_name'].' '.$employee['last_name'].' ('.$employee['designation'].')'; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                           
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Travel Summary </label>
                                        <div class="col-md-8">
                                            <textarea class="form-control required" type="text" name="travel_summary" id="travel_summary" rows="6" required></textarea>
                                        </div>
                                    </div> 
                                
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Select Success Rate </label>
                                        <div class="col-md-8">
                                            <select data-placeholder="Select Rating..." class="chosen-select-no-single col-lg-12" name="success_rate" id="success_rate" required>
                                                <option value=""></option>
                                                <option value="1">1</option>  
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>          
                                            </select>
                                        </div>
                                    </div>    
                                </div> 

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Travelled From: </label> 
                                        <div class="col-md-8">
                                            <select class="chosen-select col-lg-12" id="country1" name="travel_from_country" required="">                         
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label"></label> 
                                        <div class="col-md-8">
                                            <select class="chosen-select col-lg-12" id="state1" name="travel_from_state" required="">
                                                <option>Select State</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label"></label> 
                                        <div class="col-md-8">
                                            <input class="form-control" type="text" id="travel_from_city" name= "travel_from_city" placeholder="Enter City" required/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Travelled To: </label> 
                                        <div class="col-md-8">
                                            <select class="chosen-select col-lg-12" id="country2" name="travel_to_country" required="">                         
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label"></label> 
                                        <div class="col-md-8">
                                            <select class="chosen-select col-lg-12" id="state2" name="travel_to_state" required="">
                                                <option>Select State</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label"></label> 
                                        <div class="col-md-8">
                                            <input class="form-control" type="text" id="travel_to_city" name= "travel_to_city" placeholder="Enter City" required/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Travelled Through: </label>
                                        <div class="col-md-8">
                                            <select data-placeholder="Select an Option..." class="chosen-select-no-single col-lg-12" name="travel_through" id="travel_through" required="">
                                                <option value=""></option>
                                                <option value="Flight">Flight</option>
                                                <option value="Train">Train</option>
                                                <option value="Bus">Bus</option>
                                                <option value="Cab">Cab</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-4 control-label">From - To</label>
                                        <div class="input-daterange input-group col-lg-8">
                                            <input type="text" class="input-sm form-control" name="travel_from_date" id="travel_from_date" required/>
                                            <span class="input-group-addon">to</span>
                                            <input type="text" class="input-sm form-control" name="travel_to_date" id="travel_to_date" required/>
                                        </div>
                                    </div> 

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Travel Allowance: </label>
                                        <div class="col-md-8">
                                            <input class="form-control" type="text" id="travel_allowance" name="travel_allowance" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Food Allowance: </label> 
                                        <div class="col-md-8">
                                            <input class="form-control" type="text" id="food_allowance" name="food_allowance" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Living Allowance: </label>
                                        <div class="col-md-8">
                                            <input class="form-control" type="text" id="living_allowance" name="living_allowance" required>  
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="submit" class="btn btn-primary m-b pull-right dim" value="<?php echo (isset($travel_plan['id']) ? 'UPDATE' : 'ADD');?> TRAVEL PLAN" id="submit">
                                    </div>
                                </div>
                            </div>

                        </div>
                  </form>
            </div>
        </div>
      
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url().'assets/js/countries.js'; ?>"></script>

<script language="javascript">
    populateCountries("country1", "state1");
    populateCountries("country2", "state2");
</script>

<?php if(isset($travel_plan['id'])): ?>
    <script language="javascript">
        $("textarea#travel_purpose").val("<?php echo $travel_plan['travel_purpose'];?>");
        $("textarea#travel_summary").val("<?php echo $travel_plan['travel_summary'];?>");

        var employees   =   [<?php echo $travel_plan['employees']; ?>];
        $('#employees').val(employees);

        $("#country1").val("<?php echo $travel_plan['travel_from_country'];?>");
        $("#country1").change();
        $("#state1").val("<?php echo $travel_plan['travel_from_state'];?>");
        $("input[name=travel_from_city]").val("<?php echo $travel_plan['travel_from_city'];?>");

        $("#country2").val("<?php echo $travel_plan['travel_to_country'];?>");
        $("#country2").change();
        $("#state2").val("<?php echo $travel_plan['travel_to_state'];?>");
        $("input[name=travel_to_city]").val("<?php echo $travel_plan['travel_to_city'];?>");

        $("#project_manager").val("<?php echo $travel_plan['project_manager'];?>");
        $("#alternate_support").val("<?php echo $travel_plan['alternate_support'];?>");
        $("#success_rate").val("<?php echo $travel_plan['success_rate'];?>");
        $("#travel_through").val("<?php echo $travel_plan['travel_through'];?>");

        $("#travel_from_date").val("<?php echo date('m/d/Y', strtotime($travel_plan['travel_from_date'])); ?>");
        $("#travel_to_date").val("<?php echo date('m/d/Y', strtotime($travel_plan['travel_to_date'])); ?>");       

        $("#travel_allowance").val("<?php echo $travel_plan['travel_allowance'];?>");       
        $("#food_allowance").val("<?php echo $travel_plan['food_allowance'];?>");               
        $("#living_allowance").val("<?php echo $travel_plan['living_allowance'];?>");       
    </script>  
<?php endif; ?>

<?php include_once( APPPATH.'views/includes/footer.php' ); ?>