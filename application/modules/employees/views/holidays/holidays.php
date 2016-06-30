<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<div class="row wrapper border-bottom white-bg page-heading push-bottom">
    <div class="col-lg-12">
        <h2>
            <i class="<?php echo $icon; ?>"></i> <?php echo $title; ?>
            <a href="<?php echo base_url('employees/holiday/add'); ?>" class="btn btn-success btn-xs pull-right"><i class="fa fa-plus"></i> ADD HOLIDAY</a>
            
        </h2>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('employees/hr'); ?>">Home</a></li>
            <li class="active"><strong><?php echo $title; ?></strong></li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content">

    <div class="row">
        <div class="col-lg-12 animated fadeInRight">    
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>View Holidays <small> Here you can manage Company Holidays.</small></h5>
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
                                <th>TITLE</th>
                                <th>DESCRIPTION</th>
                                <th>DATE</th>
                                <th>STATUS</th>
                                <th class="text-center" width="12%">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count=1; foreach($holidays as $holiday): ?>
                                <tr class="gradeA">
                                    <td><?php echo $count++; ?></td>
                                    <td><?php echo $holiday['title']; ?></td>
                                    <td><?php echo $holiday['description']; ?></td>                                 
                                    <td class="center"><?php echo date('jS M, Y', strtotime($holiday['date'])); ?></td>
                                    <td><span class="btn btn-success btn-xs"><small><b><?php echo strtoupper($holiday['status']); ?></b></small></span></td>
                                    <td class="text-center">
                                        <a href="<?php echo base_url('employees/holiday/edit/'.$holiday['id']); ?>" title="Edit Holiday"><i class="fa fa-edit fa-2x"></i></a>
                                        <a href="<?php echo base_url('employees/holiday/delete/'.$holiday['id']); ?>" title="Delete Holiday" onclick="return confirm('ARE YOU SURE YOU WANT TO DELETE THE HOLIDAY?')"><i class="fa fa-trash fa-2x red"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>S.NO</th>
                                <th>TITLE</th>
                                <th>DESCRIPTION</th>
                                <th>DATE</th>
                                <th>STATUS</th>
                                <th class="text-center" width="12%">ACTIONS</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>

        </div>
    </div>
</div>


<?php include_once( APPPATH.'views/includes/footer.php' ); ?>