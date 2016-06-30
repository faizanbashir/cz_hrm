<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<div class="row wrapper border-bottom white-bg page-heading push-bottom">
    <div class="col-lg-12">
        <h2>
            <i class="<?php echo $icon; ?>"></i> <?php echo $title; ?>
        </h2>
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
            <a href="<?php echo base_url('employees/evaluation/feedback'); ?>" class="btn btn-danger m-b dim">EMPLOYEES FEEDBACK</a>
            <?php if($this->session->userdata['designation'] == 'Admin'): ?>
                <a href="<?php echo base_url('employees/questionnaire/settings'); ?>" class="btn btn-white m-b dim">SETTINGS</a>
            <?php endif; ?>
        </div>  
    </div>
    <div class="row">
        <div class="col-lg-12 animated fadeInRight">    
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?php echo $this->Employee_Model->get_employee_name_designation($questions[0]['employee_id']); ?> <small> <?php echo date('jS F, Y', strtotime($questions[0]['created_at'])); ?> </small></h5>
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

                    <table class="table table-striped table-bordered table-hover" >
                        <thead>
                            <tr>
                                <th class="text-center" width="8%">S.NO</th>
                                <th>QUESTION DESCRIPTION</th>
                                <th class="text-center" width="15%">EMPLOYEE RATING</th>
                                <th width="25%">OTHERS RATING</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $count = 1; 
                                foreach($questions as $question): 
                            ?> 
                                <tr class="gradeA">
                                    <td class="text-center"><?php echo $count++; ?></td>
                                    <td><?php echo $question['question_description']; ?></td>
                                    <td class="text-center">
                                        <?php echo $question['employee_rating']; ?>
                                    </td>
                                    <td>
                                        <?php
                                            $heads  =   explode(',', $question['concerned_head_ratings']);
                                            foreach($heads as $head)
                                            {
                                                $items  =   explode('-', $head);
                                                if(!empty($items[0]))
                                                    echo $this->Employee_Model->get_employee_name_designation($items[0]).' - '.$items[1].'<br>';
                                            }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>                            
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once( APPPATH.'views/includes/footer.php' ); ?>