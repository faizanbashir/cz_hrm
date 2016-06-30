<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<div class="row wrapper border-bottom white-bg page-heading push-bottom">
    <div class="col-lg-12">
        <h2>
            <i class="<?php echo $icon; ?>"></i> <?php echo $title; ?>
            <a href="<?php echo base_url('employees/teams/add'); ?>" class="btn btn-success btn-xs pull-right"><i class="fa fa-plus"></i> Add Team</a>
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
                    <h5>EMPLOYEES TEAMS <small> Here you can manage Employees Teams.</small></h5>
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
                                <th>TEAM NAME</th>
                                <th>TEAM LEADER</th>
                                <th width="40%;">TEAM MEMBERS</th>
                                <th class="text-center" width="12%">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($teams as $team): ?>
                                <tr class="gradeA">
                                    <td><?php echo $team['team_name']; ?></td>
                                    <td><?php echo $this->Employee_Model->get_employee_name_designation($team['team_leader']); ?></td>
                                    <td>
                                        <?php 
                                            $members    =   explode(',', $team['team_members']);
                                            foreach($members as $member)
                                                echo $this->Employee_Model->get_employee_name_designation($member).'; '; 
                                        ?>
                                    </td>

                                    <td class="text-center">
                                        <a href="<?php echo base_url('employees/teams/edit/'.$team['id']); ?>" title="Edit Employees Team"><i class="fa fa-edit fa-2x"></i></a>
                                        <a href="<?php echo base_url('employees/teams/delete/'.$team['id']); ?>" title="Delete Employees Team" onclick="return confirm('ARE YOU SURE YOU WANT TO DELETE THE TEAM?')"><i class="fa fa-trash-o fa-2x red"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>TEAM NAME</th>
                                <th>TEAM LEADER</th>
                                <th width="40%;">TEAM MEMBERS</th>
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