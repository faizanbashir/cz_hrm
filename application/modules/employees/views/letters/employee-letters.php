<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<div class="row wrapper border-bottom white-bg page-heading push-bottom">
    <div class="col-lg-12">
        <h2>
            <i class="<?php echo $icon; ?>"></i> <?php echo $title; ?>
                <a href="<?php echo base_url('employees/letter/create_letter'); ?>" class="btn btn-success btn-xs pull-right"><i class="fa fa-plus"></i>CREATE LETTER</a>
           
        </h2>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('employees/hr'); ?>">Home</a></li>
            <li><a href="<?php echo base_url('employees/letter'); ?>">Letters</a></li>
            <li class="active"><strong><?php echo $title; ?></strong></li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content">

    <div class="row">
        <div class="col-md-12"> 
            <a href="<?php echo base_url('employees/letter/'); ?>" class="btn btn-white m-b dim">Company Letters</a>
            <a href="<?php echo base_url('employees/letter/employee_letters'); ?>" class="btn btn-danger m-b dim">Employee Letters</a>
        </div>       
    </div>
    <div class="row">
        <div class="col-lg-12 animated fadeInRight">    
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Employee Letters <small>Here you can manage employee letters.</small></h5>
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
                                <th width="8%">S.NO</th>
                                <th>RECIPIENT</th>
                                <th>SUBJECT</th>
                                <th>DATE</th>
                                <th class="text-center" width="12%">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count=1; foreach($letters as $letter): ?>
                                <tr class="gradeA">
                                    <td><?php echo $count++; ?></td>
                                    <td><?php echo $letter['first_name']." ".$letter['last_name']; ?></td>
                                    <td class="text-center"><?php echo $letter['letter_subject']; ?></td>
                                    <td class="text-center"><?php echo '<b>'.date('jS M Y',strtotime($letter['created_at'])).'<b>'; ?></td>
                                    <td class="text-center">
                                        <a href="<?php echo base_url('employees/letter/view_letter/'.$letter['id']); ?>"><i class="fa fa-eye fa-2x"></i></a>
                                        <a href="<?php echo base_url('employees/letter/edit_letter/'.$letter['id']); ?>"><i class="fa fa-edit fa-2x"></i></a>
                                        <a href="<?php echo base_url('employees/letter/delete_emp_letter/'.$letter['id']); ?>" onclick="return confirm('ARE YOU SURE YOU WANT TO DELETE THE LETTER?')"><i class="fa fa-trash fa-2x red"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <tfoot>
                            <tr>
                                <th width="8%">S.NO</th>
                                <th>RECIPIENT</th>
                                <th>SUBJECT</th>
                                <th>DATE</th>
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