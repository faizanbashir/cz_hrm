<?php include_once( APPPATH.'views/includes/header.php' ); ?>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-md-9">
        <h2><i class="<?php echo $icon; ?>"></i> <?php echo $title; ?></h2>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>">Home</a></li>
            <li>Personal</li>
            <li><a href="<?php echo base_url('user/personal/off_days'); ?>">Off Days</a></li>
            <li class="active"><strong><?php echo $title; ?></strong></li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content">
     
    <div class="row">
        <div class="col-md-12 animated fadeInRight">    
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><?php if(isset($day['id'])) echo "Edit Off Day"; else echo "Request Off Day";?><small><?php if(isset($day['id'])) echo " Here you can edit Off Day."; else echo " Here you can request Off Day.";?></small></h5>
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
                    <form action="<?php if(isset($day['id'])) echo base_url('employees/attendance/edit_off_day/'.$day['id']); else echo base_url('user/personal/request_off_day') ;?>" class="form-horizontal" role="form" method="post">
                        <div class="row">
                            <div class="col-md-6-offset-4">                           
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Date</label>
                                    <div class="input-group col-md-5">
                                        <input type="text" class="date-picker-disable-future-dates form-control" name="date" id="date" value="<?php if(isset($day['id'])) echo $day['date']; ?>" required/>
                                    </div>
                                </div>                           
                               <div class="form-group">
                                    <label class="col-md-4 control-label"></label>
                                    <div class="col-md-5">
                                        <input type="submit" class="btn btn-primary m-b pull-right dim" value="<?php if(isset($extra['id'])) echo "UPDATE"; else echo "ADD"; ?> OFF DAY REQUEST" id="submit">
                                    </div>
                               </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once( APPPATH.'views/includes/footer.php' ); ?>