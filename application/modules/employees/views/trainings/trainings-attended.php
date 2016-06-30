<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<div class="row wrapper border-bottom white-bg page-heading push-bottom">
    <div class="col-lg-9">
        <h2><i class="<?php echo $icon; ?>"></i> <?php echo $title; ?>
        <!-- <a href="<?php echo base_url('employees/trainings_attended/add'); ?>" class="btn btn-success btn-xs pull-right"><i class="fa fa-plus"></i> ADD ATTENDED TRAINING</a> --></h2>
        
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('employees/hr'); ?>">Home</a></li>
            <li>Trainings</li>
            <li class="active"><strong><?php echo $title; ?></strong></li>   
        </ol>
        
    </div>
</div> 

<div class="wrapper wrapper-content">

    <div class="row">
        <div class="col-md-12"> 
           <a href="<?php echo base_url('employees/trainings_attended'); ?>" class="btn btn-danger m-b dim">Trainings Attended</a>
            <a href="<?php echo base_url('employees/trainings_recommended'); ?>" class="btn btn-white m-b dim">Trainings Recommended</a>
            <a href="<?php echo base_url('employees/trainings_requests'); ?>" class="btn btn-white m-b dim">Training Requests</a>
            <a href="<?php echo base_url('employees/trainings_reports'); ?>" class="btn btn-white m-b dim">Training Reports</a>
        </div>       
    </div>
    
    <div class="row">
        <div class="col-lg-12 animated fadeInRight">    
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Attended Trainings <small> Here you can view Trainings Attended.</small></h5>
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

                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                            <tr>
                                <th width="15%">ATTENDED BY</th>
                                <th width="15%">RECOMMENDED / REQUESTED BY</th>
                                <th>TRAINING NAME</th>
                                <th>TRAINING DESCRIPTION</th>
                                <th>TRAINING LOCATION</th>
                                <th>TRAINING DATE</th>
                                <!-- <th class="text-center">ACTIONS</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($trainings_attended as $training): ?>
                            <tr class="gradeX">
                                <td>
                                    <?php 
                                        $employees = explode(',', $training['attended_by']);
                                        foreach($employees as $employee)
                                            echo $this->Employee_Model->get_employee_name_designation($employee).'<br>'; 
                                    ?>
                                </td>
                                <td><?php echo $this->Employee_Model->get_employee_name_designation($training['recommended_requested_by']); ?></td>
                                <td><?php echo $training['training_title']?></td>
                                <td><?php echo $training['training_description']?></td>
                                <td><?php echo $training['training_city'].','.$training['training_state'].', '.$training['training_country']; ?></td>
                                <td><?php echo $training['training_start'].' <b>TO</b> '.$training['training_end']; ?></td>
                                <!-- <td class="text-center">
                                    <a href="<?php echo base_url('employees/trainings_attended/edit/'.$training['id']); ?>" title="Edit Attended Training"><i class="fa fa-edit fa-2x"></i></a
                                    <a href="<?php echo base_url()."employees/trainings_attended/delete/" . $training['id']?>" title="Delete Attended Training" onclick="return confirm('ARE YOU SURE YOU WANT TO DELETE THE TRAINING?')"><i class="fa fa-trash fa-2x"></i></a>
                                </td> -->
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ATTENDED_BY</th>
                                <th width="15%">RECOMMENDED / REQUESTED BY</th>
                                <th>TRAINING NAME</th>
                                <th>TRAINING DESCRIPTION</th>
                                <th>TRAINING LOCATION</th>
                                <th>TRAINING DATE</th>
                                <!-- <th class="text-center">ACTIONS</th> -->
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>

        </div>
    </div>
</div>

<?php include_once( APPPATH.'views/includes/footer.php' ); ?>