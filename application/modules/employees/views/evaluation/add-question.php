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
            <a href="<?php echo base_url('employees/questionnaire'); ?>" class="btn btn-danger m-b dim">QUESTIONNAIRE</a>
            <a href="<?php echo base_url('employees/evaluation/feedback'); ?>" class="btn btn-white m-b dim">EMPLOYEES FEEDBACK</a>
            <?php if($this->session->userdata['designation'] == 'Admin'): ?>
                <a href="<?php echo base_url('employees/questionnaire/settings'); ?>" class="btn btn-white m-b dim">SETTINGS</a>
            <?php endif; ?>
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
                    
                    <form action="<?php if(isset($question['id'])) echo base_url('employees/questionnaire/edit/'.$question['id']); else echo base_url('employees/questionnaire/add');?>" class="form-horizontal" role="form" method="post">
                         <div class="row">
                                <div class="col-md-6-offset-4">                           
                                    
                                    <div class="form-group">
                                       <label class="col-md-4 control-label">Enter Question </label>
                                         <div class="col-md-5">
                                             <textarea class="form-control" type="text" id="question" name= "question" rows="5" required><?php if(isset($question['id'])) echo $question['question'];?></textarea>
                                         </div>
                                    </div> 
                                    
                                    <div class="form-group">
                                        <label class="col-md-4 control-label"></label>
                                        <div class="col-md-5">
                                            <input type="submit" class="btn btn-primary m-b pull-right dim" value="<?php if(isset($question['id'])) echo "UPDATE QUESTION"; else echo "ADD QUESTION"; ?>" id="submit">
                                        </div>
                                   </div>
                             </div>
                        </div>
                    </form>
                </div>
            </div>
          
        </div>
    </div>
</div>




<?php include_once( APPPATH.'views/includes/footer.php' ); ?>