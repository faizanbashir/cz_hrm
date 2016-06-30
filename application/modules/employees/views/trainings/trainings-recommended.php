<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<div class="row wrapper border-bottom white-bg page-heading push-bottom">
    <div class="col-lg-12">
        <h2><i class="<?php echo $icon; ?>"></i> <?php echo $title; ?>
            <a href="<?php echo base_url('employees/trainings_recommended/add'); ?>" class="btn btn-success btn-xs pull-right"><i class="fa fa-plus"></i> RECOMMEND TRAINING</a>
        </h2>
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
            <a href="<?php echo base_url('employees/trainings_attended'); ?>" class="btn btn-white m-b dim">Trainings Attended</a>
            <a href="<?php echo base_url('employees/trainings_recommended'); ?>" class="btn btn-danger m-b dim">Trainings Recommended</a>
            <a href="<?php echo base_url('employees/trainings_requests'); ?>" class="btn btn-white m-b dim">Training Requests</a>
            <a href="<?php echo base_url('employees/trainings_reports'); ?>" class="btn btn-white m-b dim">Training Reports</a>
        </div>       
    </div>

    <div class="row">
        <div class="col-lg-12 animated fadeInRight">    
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Trainings Recommended <small> Here you can view Trainings Recommended.</small></h5>
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
                                <th>RECOMMENDED BY</th>
                                <th>RECOMMENDED FOR</th>
                                <th>TRAINING NAME</th>
                                <th>TRAINING DESCRIPTION</th>
                                <th>TRAINING LOCATION</th>
                                <th>TRAINING DATE</th>
                                <th>STATUS</th>                   
                                <th class="text-center" width="15%">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($trainings_recommended as $training): ?>
                                <tr class="gradeX">
                                    <td><?php echo $training['first_name'].' '.$training['last_name'].'<br>('.$training['designation'].')'; ?></td>
                                    <td>
                                        <?php 
                                            $employees = explode(',', $training['recommended_for']);
                                            foreach($employees as $employee)
                                                echo $this->Employee_Model->get_employee_name_designation($employee).'<br>'; 
                                        ?>
                                    </td>
                                    <td><?php echo $training['training_title']; ?></td>
                                    <td><?php echo $training['training_description']; ?></td>
                                    <td><?php echo $training['training_city'].', '.$training['training_state'].', '.$training['training_country']; ?></td>
                                    <td><?php echo $training['training_start'].' <b>TO</b> '.$training['training_end']; ?></td>
                                    <?php if($training['status'] == 'active'): ?>
                                        <td><span class="btn btn-success btn-xs"><small><b><?php echo strtoupper($training['status']); ?></b></small></span></td>
                                    <?php elseif($training['status'] == 'approved'): ?>
                                        <td><span class="btn btn-info btn-xs"><small><b><?php echo strtoupper($training['status']); ?></b></small></span></td>
                                    <?php elseif($training['status'] == 'attended'): ?>
                                        <td><span class="btn btn-default btn-xs"><small><b><?php echo strtoupper($training['status']); ?></b></small></span></td>
                                    <?php else: ?>
                                        <td><span class="btn btn-danger btn-xs"><small><b><?php echo strtoupper($training['status']); ?></b></small></span></td>
                                    <?php endif; ?>
                                    <td class="text-center">
                                        <?php if($training['status'] == 'active'): ?>
                                            <a href="<?php echo base_url('employees/trainings_recommended/edit/'.$training['id']); ?>" title="Edit Recommended Training"><i class="fa fa-edit fa-2x"></i></a>
                                            <a href="<?php echo base_url('employees/trainings_recommended/approve/'.$training['id']); ?>" title="Approve Recommended Training" onclick="return confirm('ARE YOU SURE YOU WANT TO APPROVE TRAINING RECOMMENDATION?')"><i class="fa fa-thumbs-o-up fa-2x"></i></a>
                                            <a href="<?php echo base_url('employees/trainings_recommended/reject/'.$training['id']); ?>" title="Reject Recommended Training" onclick="return confirm('ARE YOU SURE YOU WANT TO REJECT TRAINING RECOMMENDATION?')"><i class="fa fa-thumbs-o-down fa-2x"></i></a>
                                        <?php elseif($training['status'] == 'approved'): ?>     
                                            <a href="<?php echo base_url('employees/trainings_recommended/attended/'.$training['id']); ?>" title="Mark Training as Attended" onclick="return confirm('ARE YOU SURE YOU WANT TO MARK TRAINING AS ATTENDED?')"><i class="fa fa-check-square-o fa-2x"></i></a>                                      
                                        <?php endif; ?>
                                            <a href="<?php echo base_url('employees/trainings_recommended/delete/'.$training['id']); ?>" title="Delete Recommended Training" onclick="return confirm('ARE YOU SURE YOU WANT TO DELETE THE TRAINING?')"><i class="fa fa-trash fa-2x red"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>RECOMMENDED BY</th>
                                <th>RECOMMENDED FOR</th>
                                <th>TRAINING NAME</th>
                                <th>TRAINING DESCRIPTION</th>
                                <th>TRAINING LOCATION</th>
                                <th>TRAINING DATE</th>
                                <th>STATUS</th>
                                <th class="text-center">ACTIONS</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>

        </div>
    </div>
</div>

<?php include_once( APPPATH.'views/includes/footer.php' ); ?>