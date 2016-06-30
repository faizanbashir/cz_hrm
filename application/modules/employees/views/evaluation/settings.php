<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<link href="<?php echo base_url(); ?>assets/js/plugins/timepicker/jquery.datetimepicker.css" rel="stylesheet">

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-md-12">
        <h2><i class="<?php echo $icon; ?>"></i> <?php echo $title; ?></h2>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('employees/hr'); ?>">Home</a></li>
            <li><a href="<?php echo base_url('employees/questionnaire'); ?>">Evaluation</a></li>
            <li class="active"><strong><?php echo $title; ?></strong></li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-md-12"> 
            <a href="<?php echo base_url('employees/questionnaire'); ?>" class="btn btn-white m-b dim">QUESTIONNAIRE</a>
            <a href="<?php echo base_url('employees/evaluation/feedback'); ?>" class="btn btn-white m-b dim">EMPLOYEES FEEDBACK</a>
            <a href="<?php echo base_url('employees/questionnaire/settings'); ?>" class="btn btn-danger m-b dim">SETTINGS</a>
        </div>  
    </div>
    <div class="row">
        <div class="col-md-12 animated fadeInRight">    
            <div class="ibox float-e-margins">
               
                <div class="ibox-title">
                    <h5><?php if(isset($question['id'])) echo "Edit Question"; else echo "Add Question";?><small> <?php if(isset($question['id'])) echo "Here you can edit a question."; else echo "Here you can add a question.";?></small></h5>
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

                    <form action="<?php echo base_url('employees/questionnaire/settings');?>" class="form-horizontal" role="form" method="post">
                                               
                        <div class="form-group">
                            <label class="col-md-4 control-label">Evaluation Months </label>
                            <div class="col-md-5">
                                <select data-placeholder="Select Evaluation Months..." class="chosen-select-no-single col-lg-12" multiple tabindex="4" name="evaluation_months[]" id="evaluation_months" required="">
                                    <option value=""></option>
                                    <option value="1">January</option>
                                    <option value="2">Febuary</option>
                                    <option value="3">March</option>
                                    <option value="4">April</option>
                                    <option value="5">May</option>
                                    <option value="6">June</option>
                                    <option value="7">July</option>
                                    <option value="8">August</option>
                                    <option value="9">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="col-md-4 control-label">Evaluation Authority </label>
                            <div class="col-md-5">
                                <select data-placeholder="Select Evaluation Authority..." class="chosen-select-no-single col-lg-12" multiple tabindex="4" name="evaluation_authority[]" id="evaluation_authority" required="">
                                    <option value=""></option>
                                    <?php foreach($designations as $designation): ?>
                                        <option value="<?php echo $designation['id']; ?>"><?php echo $designation['designation_title']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div> 
                        
                        <div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-5">
                                <input type="submit" class="btn btn-primary m-b pull-right dim" value="<?php if(isset($setting['id'])) echo "UPDATE"; else echo "ADD"; ?> SETTING" id="submit">
                            </div>
                       </div>
                           
                    </form>
                </div>
            </div>
          
        </div>
    </div>
</div>

<?php //if(isset($evaluation_months['id'])): ?>
    <script type="text/javascript">
        var evaluation_months       =   [<?php echo $evaluation_months['attribute_value']; ?>];
        $('#evaluation_months').val(evaluation_months);

        var evaluation_authority    =   [<?php echo $evaluation_authority['attribute_value']; ?>];
        $('#evaluation_authority').val(evaluation_authority);
    </script>
<?php //endif; ?>

<?php include_once( APPPATH.'views/includes/footer.php' ); ?>