<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<div class="row wrapper border-bottom white-bg page-heading push-bottom">
    <div class="col-lg-12">
        <h2>
            <i class="<?php echo $icon; ?>"></i> <?php echo $title; ?>
            <?php if(is_function_accessible($this->router->fetch_module(), $this->router->fetch_class(), 'add')): ?>
                <a href="<?php echo base_url('employees/questionnaire/add'); ?>" class="btn btn-success btn-xs pull-right"><i class="fa fa-plus"></i> ADD QUESTION</a>
            <?php endif; ?>
        </h2>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>">Home</a></li>
            <li><a href="<?php echo base_url('employees/hr'); ?>">HR Management</a></li>
            <li><a href="<?php echo base_url('employees/questionnaire'); ?>">Evaluation</a></li>
            <li class="active"><strong><?php echo $title; ?></strong></li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-md-12"> 
            <?php if(is_function_accessible($this->router->fetch_module(), $this->router->fetch_class(), 'index')): ?>
                <a href="<?php echo base_url('employees/questionnaire'); ?>" class="btn btn-danger m-b dim">QUESTIONNAIRE</a>
            <?php endif; ?>
             <?php if(is_function_accessible($this->router->fetch_module(), $this->router->fetch_class(), '#')): ?>
                <a href="" class="btn btn-white m-b dim">EMPLOYEE FEEDBACK</a>
            <?php endif; ?> 
            <?php if(is_function_accessible($this->router->fetch_module(), $this->router->fetch_class(), 'settings')): ?>
                <a href="<?php echo base_url('employees/questionnaire/settings'); ?>" class="btn btn-white m-b dim">SETTINGS</a>
            <?php endif; ?>     
        </div>  
    </div>
    <div class="row">
        <div class="col-lg-12 animated fadeInRight">    
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Questionnaire <small> Please read the question carefully before rating it. </small></h5>
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

                    <form action="<?php echo base_url('user/personal/evaluation'); ?>" method="post">
                        <table class="table table-striped table-bordered table-hover" >
                            <thead>
                                <tr>
                                    <th class="text-center" width="8%">S.NO</th>
                                    <th>QUESTION DESCRIPTION</th>
                                    <th class="text-center" width="15%">RATE YOURSELF</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $count = 1; 
                                    foreach($questions as $question): 
                                ?> 
                                    <tr class="gradeA">
                                        <td class="text-center"><?php echo $count++; ?></td>
                                        <td><?php echo $question['question']; ?></td>
                                        <td class="text-center">
                                            <select required data-placeholder="Rate it..." class="chosen-select-no-single col-lg-12" name="employee_rating[]">
                                                <option value=""></option>
                                                <?php for($i = 1; $i <= 10; $i++): ?>
                                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                <?php endfor; ?>
                                            </select>
                                        </td>
                                    </tr>
                                <input type="hidden" name="question_id[]" value="<?php echo $question['id']; ?>"/>
                                <input type="hidden" name="question_description[]" value="<?php echo $question['question']; ?>"/>
                                <?php endforeach; ?>
                            </tbody>                            
                        </table>
                        <button type="submit" class="btn btn-primary pull-right">SUBMIT</button>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once( APPPATH.'views/includes/footer.php' ); ?>