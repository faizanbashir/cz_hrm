<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<div class="row wrapper border-bottom white-bg page-heading push-bottom">
    <div class="col-lg-12">
        <h2><i class="<?php echo $icon; ?>"></i> <?php echo $title; ?>
        <a href="<?php echo base_url('user/personal/request_training'); ?>" class="btn btn-success btn-xs pull-right"><i class="fa fa-plus"></i> REQUEST TRAINING</a></h2>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>">Home</a></li>
            <li>Personal</li>
            <li class="active"><strong><?php echo $title; ?></strong></li>   
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content">
    
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
                                <th>TRAINING NAME</th>
                                <th>TRAINING DESCRIPTION</th>
                                <th>TRAINING LOCATION</th>
                                <th>TRAINING DATE</th>
                                <th>STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($trainings_requested as $training): ?>
                                <tr class="gradeX">
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
                                    
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>TRAINING NAME</th>
                                <th>TRAINING DESCRIPTION</th>
                                <th>TRAINING LOCATION</th>
                                <th>TRAINING DATE</th>
                                <th>STATUS</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>

        </div>
    </div>
</div>

<?php include_once( APPPATH.'views/includes/footer.php' ); ?>