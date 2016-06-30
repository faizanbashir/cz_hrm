<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<div class="row wrapper border-bottom white-bg page-heading push-bottom">
    <div class="col-lg-12">
        <h2>
            <i class="<?php echo $icon; ?>"></i> <?php echo $title; ?>
        </h2>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('employees/hr'); ?>">Home</a></li>
            <li><a href="<?php echo base_url('employees/office'); ?>">Office Settings</a></li>
            <li class="active"><strong><?php echo $title; ?></strong></li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content">

    <div class="row">
        <div class="col-lg-12 animated fadeInRight">    
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>View Office History <small> Here you can manage Office History.</small></h5>
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
                                <th>S.NO</th>
                                <th>APPLICABLE FROM</th>
                                <th>APPLICABLE TO</th>
                                <th>TIME IN</th>
                                <th>TIME OUT</th>
                                <th>WEEKENDS</th>
                                <th>STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $day    =   array("", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
                                $count  =   1; 
                                foreach($history as $row): ?>
                                <tr class="gradeA">
                                    <td><?php echo $count++; ?></td>
                                    <td><?php echo date('jS M Y', strtotime($row['applicable_from'])); ?></td>
                                    <td><?php echo date('jS M Y', strtotime($row['applicable_to'])); ?></td>
                                    <td><?php echo $row['timing_from']; ?></td>
                                    <td><?php echo $row['timing_to']; ?></td>
                                    <td><?php 
                                            $days       =   array();
                                            $weekends   = explode(',' , $row['weekends']);
                                            foreach($weekends as $weekend)
                                               $days[]  = $day[$weekend]; 
                                            echo implode(', ', $days);
                                         ?>
                                    </td>                                
                                    <td><span class="btn btn-success btn-xs"><small><b><?php echo strtoupper($row['status']); ?></b></small></span></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>S.NO</th>
                                <th>APPLICABLE FROM</th>
                                <th>APPLICABLE TO</th>
                                <th>TIME IN</th>
                                <th>TIME OUT</th>
                                <th>WEEKENDS</th>
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