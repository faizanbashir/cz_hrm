<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<div class="row wrapper border-bottom white-bg page-heading push-bottom">
    <div class="col-lg-12">
        <h2>
            <i class="<?php echo $icon; ?>"></i> <?php echo $title; ?>
        </h2>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('employees/hr'); ?>">Home</a></li>
            <li><a href="<?php echo base_url('employees/teams'); ?>">Employee Teams</a></li>
            <li class="active"><strong><?php echo $title; ?></strong></li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12 animated fadeInRight">    
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?php echo $title; ?> <small> <?php if(isset($team['id'])) echo "Here you can edit an Employees Team." ; else echo "Here you can add a new Employees Team." ; ?></small></h5>
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
                    
                    <form action="<?php if(isset($team['id'])) echo base_url('employees/teams/edit/'.$team['id']); else echo base_url('employees/teams/add'); ?>" class="form-horizontal" role="form" method="post">

                        <div class="form-group">
                            <label class="col-md-4 control-label">Team Name </label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="team_name" id="team_name" required=""/>
                            </div>
                        </div>                     
                        
                        <div class="form-group">
                            <label class="col-md-4 control-label">Team Leader </label> 
                            <div class="col-md-6">
                                <select data-live-search="true" class="select form-control" name="team_leader" id="team_leader" required="">
                                    <option value="">Select Team Leader</option>
                                    <?php foreach($employees as $employee): ?>
                                        <option value="<?php echo $employee['id']; ?>"><?php echo $employee['first_name']." ".$employee['last_name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Team Members: </label> 
                            <div class="col-md-6">
                                <select data-placeholder="Select Members..." class="chosen-select col-lg-12" multiple tabindex="4" name="team_members[]" id="team_members" required>
                                    <option value=""></option>
                                    <?php foreach($employees as $employee): ?>
                                        <option value="<?php echo $employee['id']; ?>" ><?php echo $employee['first_name'].' '.$employee['last_name'].' ('.$employee['designation'].')'; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                                      
                        <div class="form-group">
                            <div class="col-md-10">
                                <input type="submit" class="btn btn-primary m-b pull-right dim" value="<?php if(isset($team['id'])) echo "UPDATE"; else echo "ADD"; ?> TEAM" id="submit">
                            </div>
                        </div>

                    </form>
                    

                </div>
            </div>

        </div>
    </div>
</div>

<?php if(isset($team['id'])): ?>
    <script type="text/javascript">
        $("#team_name").val("<?php echo $team['team_name']; ?>");
        $("#team_leader").val("<?php echo $team['team_leader']; ?>");
        var team_members   =   [<?php echo $team['team_members']; ?>];
        $('#team_members').val(team_members);
    </script>
<?php endif; ?>

<?php include_once( APPPATH.'views/includes/footer.php' ); ?>