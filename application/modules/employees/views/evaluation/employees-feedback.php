<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<div class="row wrapper border-bottom white-bg page-heading push-bottom">
    <div class="col-lg-9">
        <h2><i class="<?php echo $icon; ?>"></i> <?php echo $title; ?></h2>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('employees/hr'); ?>">Home</a></li>
            <li>Evaluation</li>
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
                    <h5>Employees Feedback <small>Here you can check the Feedback given by the employees.</small></h5>
                    <!-- <div class="ibox-tools ">                        
                        <a style="margin-top:-14%!important;" href="" class="btn btn-primary">RESET</a>
                    </div> -->
                    <div class="ibox-tools">                        
                        <select class="form-control" style="margin-top:-7%;" id="year" onchange="window.location = '<?php echo base_url('employees/evaluation/feedback'); ?>/'+this.value;">
                            <option value="" >Filter by Year</option>
                                <?php for($i = 2016; $i <= date('Y'); $i++): ?>
                                    <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
                                <?php endfor; ?>
                        </select>
                    </div>
                    
                </div>
                <div class="ibox-content">
                   <?php echo $this->session->flashdata('notification');?>
                    <table class="table table-striped table-bordered table-hover dataTables-example">
                        <thead>
                            <tr>
                                <th class="text-center" width="8%">S.NO</th>
                                <th>EMPLOYEE NAME & DESIG</th>
                                <th>AVG RATING BY EMPLOYEE</th>
                                <th>AVG RATING BY OTHERS</th>
                                <th>OVERALL RATING</th>
                                <th>MONTH & YEAR</th>
                                <th class="text-center" width="10%">VIEW</th>
                           </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $count = 1; 
                                foreach($employees_feedback as $question): 
                            ?> 
                                <tr class="gradeA">
                                    <td class="text-center"><?php echo $count++; ?></td>
                                    <td><?php echo $this->Employee_Model->get_employee_name_designation($question['employee_id']); ?></td>
                                    <td><?php echo $total_rating   =   $this->Evaluation_Model->get_employee_rating($question['created_at']); ?></td>                                    
                                    <td>
                                        <?php 
                                            $evaluations    =   1;
                                            $evaluated_by   =   array();
                                            $ratings        =   $this->Evaluation_Model->get_others_rating($question['created_at']); 
                                            foreach($ratings as $key => $value)
                                            {
                                                if($key == 'count')
                                                    continue;
                                                echo $this->Employee_Model->get_employee_name_designation($key).' - ';
                                                echo number_format($value/$ratings['count'], 2, '.', '');
                                                echo '<br>'; 
                                                $total_rating   +=   $value/$ratings['count'];
                                                $evaluated_by[]  =   $key; 
                                                $evaluations++;
                                            }
                                           
                                        ?>
                                    </td>
                                    <td><?php echo number_format($total_rating/$evaluations, 2, '.', ''); ?></td>
                                    <td><?php echo date('F, Y', strtotime($question['created_at'])); ?></td>
                                    <td class="text-center">
                                        <?php if(!in_array($this->session->userdata['id'], $evaluated_by) && $evaluation_authority): ?>
                                            <a href="<?php echo base_url('employees/evaluation/rating/'.$question['created_at']); ?>"><i class="fa fa-star fa-2x" style="color: rgb(207, 174, 0);"></i></a> |
                                        <?php endif; ?>
                                        <a href="<?php echo base_url('employees/evaluation/employee/'.$question['created_at']); ?>"><i class="fa fa-file-text-o fa-2x"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="text-center" width="8%">S.NO</th>
                                <th>EMPLOYEE NAME & DESIG</th>
                                <th>AVG RATING BY EMPLOYEE</th>
                                <th>AVG RATING BY OTHERS</th>
                                <th>OVERALL RATING</th>
                                <th>MONTH & YEAR</th>
                                <th class="text-center">VIEW</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>   
            </div>
        </div>
    </div>
</div>

<?php if($this->uri->segment(4)): ?>
    <script type="text/javascript">
        $('#year').val(<?php echo $this->uri->segment(4); ?>);
    </script>
<?php endif; ?>

<?php include_once( APPPATH.'views/includes/footer.php' ); ?>